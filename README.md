# TESTE VOZ - BACKEND ⚙️ (LARAVEL 11, PHP 8.3)


### 🗂️ Clone Repositório
```sh
git clone git@github.com:davidmarquescoder/teste-voz-backend.git
```


```sh
cd teste-voz-backend/
```


### 📌 Crie o Arquivo .env
```sh
cp .env.example .env
```


### 📌 Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME="Voz"
APP_URL=http://localhost:8989

DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=datalake
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


### 🐳 Suba os containers do projeto
```sh
docker-compose up -d
```


### 🏗️ Acessar o container
```sh
docker compose exec app bash
```


### 🌐 Instalar as dependências do projeto
```sh
composer install
```


### 🔑 Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

### 🎲 Rode as migrations
```sh
php artisan migrate
```


### 🚀 Acessar o projeto
[http://localhost:8989/api](http://localhost:8989/api)
