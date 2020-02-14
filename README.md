# api-fil-rouge

## Requirements

- Mysql
- Composer

## Start project

```
 composer install
```

- Set DATABASE_URL in .env(db_name is greenleaf)

```
./bin/console doctrine:database:create
./bin/console make:migration
./bin/console doctrine:migrations:migrate
./bin/console doctrine:fixtures:load

./bin/console server:run
```

## Routes available

- API Routes to get DATA

```
/velib (Get Velib Informations from API)
/trash (Get Trash Informations from API)
```

- Routes to Manage User

```
/login (To log a user)
/register (To register a user)
```

#### To check if your app is working go to

> yourlocalhost/api

If you can see api platform's swagger, everything is okay for you :)
