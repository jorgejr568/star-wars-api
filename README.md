# Star Wars API

## Dependencies

- PHP
- Lumen (Micro framework)
- Flysystem Cached Adapter (Cache engine)
- DotEnv (Environment Variables for PHP)

## Instalation

- git clone https://github.com/jorgejr568/star-wars-api
- cd star-wars-api
- composer install
- cp .env-example .env (Adapting to your current env)
- php artisan migrate (Migrating database)

## Inserting data

### Loading planets from [Swapi](https://swapi.co/)

- php artisan db --seed

## Unit Testing

- phpunit

## Environment

- Highly recommended to use [Homestead](https://laravel.com/docs/5.7/homestead) with [Vagrant](https://www.vagrantup.com/)