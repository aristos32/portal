#! /bin/sh
set -e

echo "Tearing down existing stack to free ports..."
docker compose down --remove-orphans

echo ""
echo "Updating Project..."
git switch main
git pull

echo ""
echo "Switching to initial branch..."
git switch -

echo ""
echo "Ensuring storage and bootstrap/cache exist and are writable (for composer post-install)..."
docker compose run --rm --entrypoint sh composer -c 'mkdir -p /var/www/html/storage/logs /var/www/html/storage/framework/sessions /var/www/html/storage/framework/views /var/www/html/storage/framework/cache /var/www/html/bootstrap/cache && chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache'

echo ""
echo "Installing Composer Dependencies..."
docker compose run --rm composer install

echo ""
echo "Starting docker services..."
docker compose up -d

echo ""
echo "Setting permissions inside the container..."
docker compose exec app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && docker compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

echo ""
echo "Installing NPM Dependencies..."
docker compose exec app npm install

# echo "setting file ownership"
# sudo chown -R aristos:aristos *

echo ""
echo "Running Migrations and Seeding"
docker compose exec app php artisan migrate:fresh --seed

echo ""
echo "Running Queue Worker..."
docker compose exec app php artisan queue:work &

echo ""
echo "Building Assets for production..."
docker compose exec app npm run build
docker compose exec app rm -f public/hot
docker compose exec app php artisan l5-swagger:generate

echo ""
echo "Running Unit Tests..."
docker compose exec app php artisan test --parallel

echo ""
echo "Open url: http://127.0.0.1:8082/"
echo ""