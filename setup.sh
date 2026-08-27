#!/bin/bash
set -e

echo "==> Запуск БД и контейнера..."
docker compose up -d db app

echo "==> Ждём готовности MariaDB..."
sleep 15

echo "==> Устанавливаем Laravel 12 во временную папку..."
docker compose exec app composer create-project laravel/laravel:^12.0 /tmp/laravel-new --no-interaction

echo "==> Копируем файлы Laravel в проект..."
docker compose exec app bash -c "cp -r /tmp/laravel-new/. /var/www/html/"

echo "==> Восстанавливаем наши view и route..."
# Blade-шаблон уже лежит в resources/views/welcome.blade.php
# Пишем route для главной страницы
docker compose exec app bash -c "cat > /var/www/html/routes/web.php << 'ROUTE'
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));
ROUTE"

echo "==> Перемещаем ассеты в public/..."
docker compose exec app bash -c "
  [ -d /var/www/html/css ]       && mv /var/www/html/css    /var/www/html/public/css
  [ -d /var/www/html/js ]        && mv /var/www/html/js     /var/www/html/public/js
  [ -d /var/www/html/images ]    && mv /var/www/html/images /var/www/html/public/images
  [ -f /var/www/html/anim.json ] && mv /var/www/html/anim.json /var/www/html/public/anim.json
  true
"

echo "==> Настраиваем .env..."
docker compose exec app bash -c "
  cp /var/www/html/.env.docker /var/www/html/.env
  php artisan key:generate
"

echo "==> Устанавливаем Filament..."
docker compose exec app composer require filament/filament:"^3.0" --no-interaction
docker compose exec app php artisan filament:install --panels --no-interaction

echo "==> Применяем миграции..."
docker compose exec app php artisan migrate --force

echo "==> Устанавливаем права..."
docker compose exec app bash -c "
  chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
  chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
"

echo "==> Запускаем nginx..."
docker compose up -d nginx

echo ""
echo "Done! Сайт:       http://localhost:8080"
echo "Создать admin:    docker compose exec app php artisan make:filament-user"
echo "Admin панель:     http://localhost:8080/admin"
