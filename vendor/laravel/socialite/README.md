# Identity Fraud

> Plataforma social desenvolvida com Laravel 13, Docker, MariaDB e Nginx.

---

## 📋 Índice

- [Requisitos](#-requisitos)
- [Stack](#-stack)
- [Início Rápido](#-início-rápido)
- [Configuração](#-configuração)
- [Base de Dados](#-base-de-dados)
- [Comandos Úteis](#-comandos-úteis)
- [Utilizadores Windows (WSL2)](#-utilizadores-windows-wsl2)

---

## ✅ Requisitos

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- Git

---

## 🧱 Stack

| Serviço | Tecnologia        | Porta |
|---------|-------------------|-------|
| App     | PHP 8.4 (FPM)     | -     |
| Web     | Nginx             | 8000  |
| BD      | MariaDB 10.8      | 3306  |
| Admin   | Adminer           | 8081  |

---

## 🚀 Início Rápido

### 1. Clonar o repositório

```bash
git clone <repo-url>
cd identityfraud
```

### 2. Copiar o ficheiro de ambiente

```bash
cp .env.example .env
```

### 3. Iniciar os containers

```bash
docker compose up -d --build
```

### 4. Instalar dependências

```bash
docker compose exec app composer install
```

### 5. Gerar a chave da aplicação

```bash
docker compose exec app php artisan key:generate
```

### 6. Executar migrações e popular a base de dados

```bash
docker compose exec app php artisan migrate:fresh --seed
```

### 7. Abrir a aplicação

```
http://localhost:8000
```

---

## ⚙️ Configuração

Edita o ficheiro `.env` com as seguintes definições de base de dados:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=identity_fraud
DB_USERNAME=admin
DB_PASSWORD=secret
```

---

## 🗄️ Base de Dados

| Ferramenta | URL                   |
|------------|-----------------------|
| Adminer    | http://localhost:8081 |

**Credenciais do Adminer:**

| Campo      | Valor          |
|------------|----------------|
| Sistema    | MySQL          |
| Servidor   | mysql          |
| Utilizador | admin          |
| Palavra-passe | secret      |
| Base de dados | identity_fraud |

> ⚠️ `migrate:fresh` **apaga todos os dados**. Utilizar com cuidado.
> Os dados persistem até executares `docker compose down -v`.

---

## 🛠️ Comandos Úteis

```bash
# Parar os containers
docker compose down

# Reconstruir os containers
docker compose up -d --build

# Entrar no container da aplicação
docker compose exec app bash

# Limpar a cache do Laravel
docker compose exec app php artisan optimize:clear

# Executar migrações
docker compose exec app php artisan migrate

# Executar seeders
docker compose exec app php artisan db:seed

# Ver logs
docker compose logs -f app
```

---

## 🪟 Utilizadores Windows (WSL2)

> Se estiveres no Windows, segue estes passos para evitar **problemas graves de desempenho**.

### Porquê é importante?

O Docker no Windows utiliza virtualização do sistema de ficheiros entre o Windows e o Linux.
O Laravel faz muitas chamadas ao sistema de ficheiros (vistas, cache, logs) — isto torna a aplicação **muito lenta** quando o projeto está no sistema de ficheiros do Windows (`C:\Users\...`).

Correr dentro do WSL2 oferece um desempenho **quase igual ao Linux nativo**.

### Configurar o WSL2

1. Instalar o WSL2 + Ubuntu:
```
https://learn.microsoft.com/windows/wsl/install
```

2. Abrir o terminal do Ubuntu (WSL2)

3. Clonar o projeto **dentro** do sistema de ficheiros Linux:
```bash
cd ~
git clone <repo-url>
cd identityfraud
```

### ❌ Nunca fazer isto

```bash
# NÃO clonar aqui
cd /mnt/c/Users/nomeutilizador/projetos  # ← lento, evitar
```

### ✅ Fazer sempre isto

```bash
# Clonar dentro do sistema de ficheiros do WSL2
cd ~  # /home/nomeutilizador/
git clone <repo-url>
```

---

## 📁 Estrutura do Projeto

```
identityfraud/
├── app/                  # Aplicação Laravel
├── docker/               # Ficheiros de configuração Docker
│   └── entrypoint.sh     # Script de arranque do container
├── public/               # Recursos públicos
├── resources/            # Vistas, JS, CSS
├── routes/               # Rotas da aplicação
├── docker-compose.yml    # Serviços Docker
├── Dockerfile            # Build do container da aplicação
└── .env.example          # Modelo de ambiente
```