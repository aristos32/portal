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

echo "Running Seeders"
docker-compose exec app npm run dev