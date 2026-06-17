# Remove a pasta errada
rm -rf ~/identityfraud

# Copia o projeto completo do Windows
sudo cp -r "/mnt/c/Program Files/Ampps/www/scripts/Pap/site_laravel/identityfraud" ~/identityfraud

# Confirma que o artisan existe
ls ~/identityfraud/artisan

# Entra na pasta e arranca
cd ~/identityfraud

# Linkar as imagens
php artisan storage:link

# Fazer comandos no container do site
docker compose exec app

# Entrar no container
docker compose exec app bash