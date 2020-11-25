# Documentation
## Description
- I created a project in laravel 8 (PHP version is 8.4)
- I used a few packages that helped me speed up the process
- I used bootstrap 4 as a frontend framework
- I used docker
- I created a page for import file and listing of data
- I created a CRUD for tasks
- The import is processed synchronously. A better way of doing it is asynchronously, with queue jobs.

## Clone project
- Clone repository
- Run following command
```bash
docker-compose up
```
- Create database if necessary
```bash
docker exec -it lara-mysql /bin/bash
mysql -u root -p //password is test123
create database laravel;
exit
```
- Go to http://localhost:8080

## Reset database
```bash
docker exec -it lara-php /bin/bash
php artisan migrate:refresh
```

# Development
## Testing
```bash
php artisan test
php artisan test --testsuite=Unit --stop-on-failure
php artisan test --testsuite=Feature --stop-on-failure
```

```bash
vendor/bin/phpunit
```

## Useful commands
SSH into container
```bash
docker exec -it lara-php /bin/bash
```

## Done
Generate Migrations, Models and Controllers
```bash
php artisan make:model Client -mcr
php artisan make:model Project -mcr
php artisan make:model Task -mcr
php artisan make:model Role -mcr
```

Generate Tests
```bash
php artisan make:test TaskTest --unit
```


Add Packages
```bash
composer require maatwebsite/excel
```

```bash
composer require laravel/ui
php artisan ui bootstrap
```
