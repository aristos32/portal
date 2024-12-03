#! /bin/sh
echo "Updating Project"
git pull

echo "Installing Composer Dependencies"
docker-compose run --rm composer install

echo "Installing NPM Dependencies"
docker-compose exec app npm install 

echo 'stoping docker services'
docker-compose down

echo "starting docker services"
docker-compose up -d

echo "Running Migrations"
docker-compose exec app php artisan migrate

echo "Setting permissions inside the container"
docker-compose exec app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && docker-compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# echo "setting file ownership"
# sudo chown -R aristos:aristos *

echo "Running Queue Worker"
docker-compose exec app php artisan queue:work &

echo "Building Assets for production"
docker-compose exec app npm run build

echo "Running NPM Dev"
docker-compose exec app npm run dev

# must run after npm run dev
# echo "Running Unit Tests"
# docker-compose exec app php artisan test