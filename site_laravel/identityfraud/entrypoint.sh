#!/bin/sh
echo "⏳ Aguardar MySQL..."

until nc -z mysql 3306; do
  sleep 2
done

echo "✅ MySQL pronto"

if [ ! -d "vendor" ]; then
    echo "📦 Instalando dependências..."
    composer install
fi

if [ ! -f ".env" ]; then
    echo "⚙️ Criando .env..."
    cp .env.example .env
fi

if ! grep -q "APP_KEY=base64" .env; then
    echo "🔑 Gerando APP_KEY..."
    php artisan key:generate --force
fi

echo "🧹 Limpeza Laravel..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

echo "📦 Migrando base de dados..."
php artisan migrate --force

echo "🌱 Seed..."
php artisan db:seed --force || true

chmod -R 777 storage bootstrap/cache

php-fpm -F
