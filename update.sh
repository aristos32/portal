#! /bin/sh
echo "Updating Project"
git pull

echo "Installing Composer Dependencies"
docker-compose run --rm composer install

echo "Installing NPM Dependencies"
docker-compose exec app npm install 

echo "starting docker services"
docker-compose up -d

echo "Running Migrations"
docker-compose exec app php artisan migrate

docker-compose exec app npm run dev

# must run after npm run dev
echo "Running Unit Tests"
docker-compose exec app php artisan test