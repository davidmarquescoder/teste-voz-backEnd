# ⚙️ TESTE VOZ - BACKEND (LARAVEL 11, PHP 8.3)


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
APP_LOCALE=pt_BR

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


### 📦 Instalar as dependências do projeto
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


---


# **API ENDPOINTS**

Use ferramentas como [Postman](https://www.postman.com/) para testar os endpoints da API.

## **Endpoints Disponíveis**

### **Produtos**

#### 1. `GET /products/`
- **Descrição**: Retorna uma lista paginada de produtos.
- **Parâmetros de Query**:
  | Parâmetro  | Tipo    | Obrigatório | Descrição                                  |
  |------------|---------|-------------|------------------------------------------|
  | `per_page` | Inteiro | Não         | Define a quantidade de itens por página. |
- **Exemplo de Requisição**:
  ```http
  GET /products/?per_page=15 HTTP/1.1
  Host: api.example.com
  ```
- **Exemplo de Retorno**:
  ```json
  {
    "message": "Produtos recuperados em nossa base de dados.",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 2,
                "name": "Monitor 27 polegadas 165hz 1ms",
                "description": "Produto de altíssima qualidade e performance.",
                "price": "1249.89",
                "created_at": "2025-01-08T17:49:33.000000Z",
                "updated_at": "2025-01-08T17:54:48.000000Z"
            },
            {
                "id": 3,
                "name": "Monitor 27 polegadas 165hz 5ms",
                "description": "Produto de altíssima qualidade e performance.",
                "price": "3.15",
                "created_at": "2025-01-08T17:55:42.000000Z",
                "updated_at": "2025-01-08T17:55:42.000000Z"
            }
        ],
        "first_page_url": "http://localhost:8989/api/products?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8989/api/products?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Anterior",
                "active": false
            },
            {
                "url": "http://localhost:8989/api/products?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Próximo &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8989/api/products",
        "per_page": 10,
        "prev_page_url": null,
        "to": 2,
        "total": 2
    }
  }
  ```

---

#### 2. `POST /products/`
- **Descrição**: Cria um novo produto.
- **Corpo da Requisição**:
  ```json
  {
      "name": "Produto B",
      "description": "Descrição do Produto B",
      "price": 150.00
  }
  ```
- **Exemplo de Retorno**:
  ```json
  {
      "message": "Novo produto cadastrado com sucesso.",
      "data": {
          "id": 2,
          "name": "Produto B",
          "description": "Descrição do Produto B",
          "price": 150.00,
          "created_at": "2025-01-08T10:05:00.000Z",
          "updated_at": "2025-01-08T10:05:00.000Z"
      },
      "code": 201
  }
  ```

---

#### 3. `GET /products/{ID}`
- **Descrição**: Retorna informações detalhadas de um produto específico identificado pelo seu `ID`.
- **Exemplo de Requisição**:
  ```http
  GET /products/1 HTTP/1.1
  Host: api.example.com
  ```
- **Exemplo de Retorno**:
  ```json
  {
      "message": "Produto encontrado em nossa base de dados.",
      "data": {
          "id": 1,
          "name": "Produto A",
          "description": "Descrição do Produto A",
          "price": 100.00,
          "created_at": "2025-01-08T10:00:00.000Z",
          "updated_at": "2025-01-08T10:00:00.000Z"
      },
      "code": 200
  }
  ```

---

#### 4. `PATCH /products/{ID}`
- **Descrição**: Atualiza as informações de um produto específico identificado pelo seu `ID`.
- **Corpo da Requisição**:
  ```json
  {
      "price": 120.00
  }
  ```
- **Exemplo de Retorno**:
  ```json
  {
      "message": "Atualização de produto bem sucedida.",
      "data": {
          "id": 1,
          "name": "Produto A",
          "description": "Descrição do Produto A",
          "price": 120.00,
          "created_at": "2025-01-08T10:00:00.000Z",
          "updated_at": "2025-01-08T10:10:00.000Z"
      },
      "code": 200
  }
  ```

---

#### 5. `DELETE /products/{ID}`
- **Descrição**: Remove um produto específico identificado pelo seu `ID`.
- **Exemplo de Retorno**:
  ```json
  {
      "message": "",
      "code": 204
  }
  ```
---
