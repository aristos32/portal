## Current Project
- https://docs.google.com/document/d/1lkJQ-pVw1q4SR7appH6KRTOHF_mkFCsU7Vz3t-X27c0/edit#heading=h.55sbk8djw69w
- Create a backoffice / clients portal
- Should use the latest technology to learn
- Laravel, postgressql, tailwind, docker 

### Start Project
```
$ ./update.sh
```

### Individual Services
```bash
$ docker compose up -d
$ docker compose exec app npm run dev  
$ docker exec -it crm-crm-fpm-1 sh
$ docker compose exec app php artisan migrate  
$ docker compose exec app php artisan migrate:fresh --seed  
> http://127.0.0.1:8082/  

$ docker compose exec app npm install  
```

### Laravel getting help
```
$ docker compose exec app php artisan
$ docker compose exec app php artisan make
$ docker compose exec app php artisan help migrate:fresh
```

### versions
```bash
$ docker --version  //Docker version 26.1.4, build 5650f9b    
$ docker compose --version //docker compose version 1.29.2, build unknown
$ node -v
$ php artisan --version
```

### Initial Setup
- clore repository:  
```$ git clone  git@github.com:aristos32/exercise.git```  
```$ cd exercise```
- create .env file  
```$ cp my-laravel/.env.example my-laravel/.env```

- In the .env, update these variables to match the ones in the docker compose  
```
# db
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=portal
DB_USERNAME=administrator
DB_PASSWORD=password

```
- Install composer dependencies  
```
$ docker compose run --rm composer install  
$ docker compose run --rm composer require barryvdh/laravel-debugbar --dev
```

- If any permission errors like this occurs:  
```
The stream or file "/var/www/html/storage/logs/laravel.log" could not be opened in append mode: Failed to open stream: Permission denied The exception occurred while attempting to log
```  
then set correct permissions and ownership:  
```
$ docker compose exec app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && docker compose exec app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
```

- if cannot save file:
Failed to save '2024_10_28_185159_create_accounts_table.php': Insufficient permissions.  

- file_put_contents(/var/www/html/storage/framework/views/bae129cef9e600352d1c88ca55b5c61c.php): Failed to open stream: Permission denied

```
$ sudo chown -R aristos:aristos my-laravel/
```

- install Laravel Sanctum for api  
```$ docker compose exec app php artisan install:api```

- build and start all docker services
```$ docker compose up -d --build```

- verify that all services are up  
```$ docker compose ps```

- Run migrations  
```$ docker compose exec app php artisan migrate```

- install npm
```bash
$ docker compose exec app npm install  
```

- Generate Laravel application encryption key -  missing key exception 

```$ docker compose exec app php artisan key:generate```


- Tinker CLI - command line playground.
```
$ docker compose exec app php artisan tinker  
> \App\Models\Job::factory(100)->create();
> \App\Models\User::all();
> \App\Models\Customer::find(1);
> App\Models\User::factory()->unverified()->create();
```

- Assets related - is vite running
```
http://localhost:5173/
php artisan view:clear
php artisan config:clear

$ docker compose exec app npm run dev 
  ➜  Local:   http://localhost:5173/
```

- start the scheduler  
```$ docker compose exec app php artisan schedule:work```

### Testing
#### Check if application is running  
```
http://127.0.0.1:8082/
http://127.0.0.1:8082/dashboard
http://127.0.0.1:8082/test
```  


#### Logs
```$ tail -f my-laravel/storage/logs/laravel.log```

#### Redis CLI connect
```$ docker compose exec redis redis-cli```  
-- KEYS * (see all keys)  
-- GET key_name  
-- DEL key_name

#### Database
Connect to the database from the host machine  
```
$ psql -h localhost -p 5432 -U administrator -d portal
$ mysql -h 127.0.0.1 -P 3308 -u laravel -p
```
Clean and seed again
```
$ docker compose exec app php artisan migrate:fresh --seed
```

#### Publish Vendor Views to my resources/views
```$ docker compose exec app php artisan vendor:publish```


#### Run all tests  
```$ docker compose exec app php artisan test```

#### xdebug - add this
```
"pathMappings": {
                "/var/www/html": "${workspaceFolder}/my-laravel"
            }
```

#### Run Queue
```
$ docker compose exec app php artisan queue:work
```

#### Useful tools
```
https://mailtrap.io/
```

