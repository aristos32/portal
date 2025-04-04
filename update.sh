#! /bin/sh
echo "Updating Project"
git switch main
git pull

echo "Switching to initial branch"
git switch -

echo "Installing Composer Dependencies"
docker-compose run --rm composer install

echo 'stoping docker services'
docker-compose down

echo "starting docker services"
docker-compose up -d

echo "Setting permissions inside the container"
docker-compose exec app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && docker-compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

echo "Installing NPM Dependencies"
docker-compose exec app npm install 

echo "Running Migrations"
docker-compose exec app php artisan migrate

# echo "setting file ownership"
# sudo chown -R aristos:aristos *

echo "Seeding the container"
docker-compose exec app php artisan migrate:fresh --seed

echo "Running Queue Worker"
docker-compose exec app php artisan queue:work &

echo "Building Assets for production"
docker-compose exec app npm run build

echo "Running NPM Dev in the background"
docker-compose exec -d app npm run dev

# echo "Running Unit Tests"
docker-compose exec app php artisan test