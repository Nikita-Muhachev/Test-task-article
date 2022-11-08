## Тестовое задание сайт - статейник

Для запуска проекта нужно:
1. Выполнить команду ```cp .env.example .env```
2. Создать базу данных и указать соответственные доступы в ```.env```
3. выполнить следующие команды:
```
composer install
chmod -R 777 storage
chmod -R 777 bootstrap/cache
app php artisan key:generate
php artisan migrate:fresh
php artisan db:seed
php artisan storage:link
```
4. Так же нужно запустить джобы (нужны по тз) ```docker-compose exec app php artisan queue:work```