# Documentation
- Clone repository
- Run following command
```bash
docker-compose up
```
- Go to http://localhost:8080

```bash
php artisan migrate:refresh
```

# Development
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
