#!/usr/bin/env bash
echo 'Running composer'
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo 'Caching config...'
php artisan config:cache

echo 'Caching routes...'
php artisan route:cache

# デプロイ時に既存のデータをリセット&マイグレーション TODO: #12が解決したら削除
echo 'Running migrations...'
php artisan migrate:fresh --force

echo 'Running seeders...'
php artisan db:seed --force