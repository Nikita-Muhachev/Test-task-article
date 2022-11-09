## Тестовое задание сайт - статейник

Для запуска проекта нужно:
1. Выполнить команду ```cp .env.example .env```
2. Создать базу данных и указать соответственные доступы в ```.env```
3. выполнить следующие команды:
```
composer install
npm install
php artisan key:generate
php artisan migrate:fresh
php artisan db:seed
```