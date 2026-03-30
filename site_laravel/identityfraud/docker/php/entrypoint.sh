#!/bin/bash
set -e

echo "Waiting for MySQL to be ready..."
while ! php -r "new PDO('mysql:host=mysql;port=3306;dbname=itendity_fraud', 'root', 'root');" 2>/dev/null; do
    sleep 2
done
echo "MySQL is ready."

echo "Running migrations..."
php artisan migrate --force

echo "Starting Laravel development server..."
php artisan serve --host=0.0.0.0 --port=8000
