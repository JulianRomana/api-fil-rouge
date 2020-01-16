# api-fil-rouge

## Requirements
* Mysql
* Composer

## Start project
```
 composer install
```
* Set DATABASE_URL in .env(db_name is greenleaf)
```
./bin/console doctrine:database:create
./bin/console make:migrations:migrate
./bin/console doctrine:fixtures:load

./bin/console server:run
```
#### To check if your app is working go to
> yourlocalhost/api

If you can see api platform's swagger, everything is okay for you :)