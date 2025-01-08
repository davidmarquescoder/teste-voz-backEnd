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


### 🚀 Rota base do projeto
[http://localhost:8989/api](http://localhost:8989/api)


# API ENDPOINTS

## **Produtos**

### **1. `GET` /products/**
Retorna uma lista paginada de produtos no formato JSON.

#### **Parâmetros de Query**:
| Parâmetro  | Tipo    | Obrigatório | Descrição                                  |
|------------|---------|-------------|------------------------------------------|
| `per_page` | Inteiro | Não         | Define a quantidade de itens por página. |

---

### **2. `POST` /products/**
Cria um novo produto.  
- O corpo da requisição deve conter os dados necessários para o cadastro do produto no formato JSON.

---

### **3. `GET` /products/{ID}**
Retorna as informações detalhadas de um produto específico identificado pelo seu `ID`.

---

### **4. `PATCH` /products/{ID}**
Atualiza as informações de um produto específico identificado pelo seu `ID`.  
- O corpo da requisição deve conter os dados a serem atualizados no formato JSON.

---

### **5. `DELETE` /products/{ID}**
Remove um produto específico identificado pelo seu `ID` do sistema.

---
