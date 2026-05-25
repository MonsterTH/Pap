# 🚀 Identity Fraud - Laravel + Docker

Este projeto é uma aplicação Laravel containerizada com Docker, incluindo:

- PHP 8.4 (FPM)
- MariaDB 10.8
- Nginx
- Adminer

---

## 📦 Pré-requisitos

- Docker
- Docker Compose

---

## ⚠️ IMPORTANTE (Windows + WSL2)

Se estiveres a usar Windows, é OBRIGATÓRIO (para boa performance) usar o projeto dentro do WSL2 (Ubuntu).

### 🔧 Passos:

1. Instalar WSL2 + Ubuntu:
https://learn.microsoft.com/windows/wsl/install

2. Abrir Ubuntu (WSL)

3. Clonar o projeto DENTRO do Linux (WSL), por exemplo:

cd ~
git clone <repo-url>
cd identityfraud

### ❌ NÃO FAZER:
- Não colocar o projeto em C:\Users\...
- Não executar Docker com bind mount a partir do filesystem do Windows (/mnt/c/...)

### 🚨 Porquê isto é importante:

O Docker no Windows usa virtualização de filesystem. Isso torna Laravel lento porque:

- muitos acessos a ficheiros (views, cache, logs)
- sync entre Windows e Linux é lento
- I/O do bind mount é o maior bottleneck

👉 No WSL2 (filesystem Linux) o desempenho é quase igual ao Linux nativo.

---

## 🛠️ Como iniciar o projeto

### 1. Subir os containers

docker compose up -d --build

---

### 2. Instalar dependências Laravel

docker compose exec app composer install

---

### 3. Criar ficheiro .env

cp .env.example .env

Configuração da base de dados:

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=identity_fraud
DB_USERNAME=admin
DB_PASSWORD=secret

---

### 4. Gerar chave da aplicação

docker compose exec app php artisan key:generate

---

### 5. Migrar e popular base de dados (apaga tudo)

docker compose exec app php artisan migrate:fresh --seed

---

## 🌐 Acessos

Aplicação:
http://localhost:8000

Adminer:
http://localhost:8081

Configuração Adminer:
- System: MySQL
- Server: mysql
- Username: admin
- Password: secret
- Database: identity_fraud

---

## 🐳 Docker services

- app (Laravel PHP-FPM)
- nginx
- mysql (MariaDB)
- adminer

---

## ⚙️ Comandos úteis

Parar containers:
docker compose down

Rebuild:
docker compose up -d --build

Entrar no container:
docker compose exec app bash

Limpar cache Laravel:
docker compose exec app php artisan optimize:clear

---

## 🧪 Notas importantes

- migrate:fresh apaga toda a base de dados
- MySQL mantém dados até docker compose down -v
- entrypoint.sh é necessário para PHP-FPM
- Recomendado usar WSL2 no Windows para evitar lentidão

---

## 🏁 Final

Projeto disponível em:
http://localhost:8000