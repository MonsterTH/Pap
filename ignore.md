# Remove a pasta errada
rm -rf ~/identityfraud

# Copia o projeto completo do Windows
cp -r "/mnt/c/Program Files/Ampps/www/scripts/Pap/site_laravel/identityfraud" ~/identityfraud

# Confirma que o artisan existe
ls ~/identityfraud/artisan

# Entra na pasta e arranca
cd ~/identityfraud
docker compose up -d --build