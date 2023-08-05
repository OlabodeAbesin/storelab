# E-commerce API

This is a simple e-commerce RESTful API built using Laravel and Docker. The API allows users to perform CRUD operations on products.

## Setup

1. Clone the repository: `git clone https://github.com/OlabodeAbesin/storelab.git`
2. Navigate to the project directory: `cd storelab`
3. Create a `.env` file based on `.env.example` and set the necessary environment variables (database, etc.).
4. Install the required dependencies: `composer install`
5. Generate the application key: `php artisan key:generate`
6. Run database migrations: `php artisan migrate`
7. Start the development server: `php artisan serve`

## API Endpoints

Refer to the API documentation below for details on available endpoints and their request/response formats.

## Authentication

This API uses Sanctum for user authentication. To access the protected endpoints, clients must include the `Authorization` header with a valid Bearer token obtained after logging in.

## Testing

Run PHPUnit tests to verify the functionality of the API endpoints:

```
php artisan test
```

## Dockerization

This application is Dockerized using Laravel Sail, which provides a lightweight development environment with Docker containers. To start the application locally, use the following command:

```
./vendor/bin/sail up -d
```
The application will be accessible at `http://localhost`.

1. In your terninal, build the Docker image using Sail: ```./vendor/bin/sail build```

2. Run the Docker container: ```./vendor/bin/sail up -d```


## API Documentation


Link to postman collection (easier to import and run the endpoints)

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/3023926-804457f3-b7f9-4b6b-988b-882a0793219a?action=collection%2Ffork&collection-url=entityId%3D3023926-804457f3-b7f9-4b6b-988b-882a0793219a%26entityType%3Dcollection%26workspaceId%3D400fe098-01ea-414f-b4a7-24273bc1ddf1)
### Base URL
```
http://your-api-base-url/api
```

### Authentication
This API uses Sanctum for user authentication. To access the protected endpoints, clients must include the `Authorization` header with a valid Bearer token obtained after logging in.

### Endpoints

#### 1. Create an Api user

```
POST /auth/register
```

**Purpose:** Create a new user in the database.

**Request Format**
```json
{
    "name": "Todd James",
    "email": "test@storelab.com",
    "password": "123456"
}
```

**Response Format**
```json
{
    "status": "Success",
    "message": "Api User Created",
    "data": {
        "name": "Todd James",
        "email": "test@storelab.com",
        "api_token": "1|y6TUVWXYZ....."
    }
}
```

#### 2. Create a Product

```
POST /products
```

**Purpose:** Create a new product in the database.

**Request Format**
```json
{
  "name": "Product Name",
  "description": "Product Description",
  "price": 25.99,
  "quantity": 100
}
```

**Response Format**
```json
{
  "message": "Product created successfully",
  "data": {
    "id": 1,
    "name": "Product Name",
    "description": "Product Description",
    "price": 25.99,
    "quantity": 100,
    "created_at": "2023-08-03 12:34:56",
    "updated_at": "2023-08-03 12:34:56"
  }
}
```

#### 3. Update a Product

```
PUT /products/{product_id}
```

**Purpose:** Update an existing product.

**Request Format**
```json
{
  "name": "Updated Product Name",
  "description": "Updated Product Description",
  "price": 29.99,
  "quantity": 75
}
```

**Response Format**
```json
{
  "message": "Product updated successfully",
  "data": {
    "id": 1,
    "name": "Updated Product Name",
    "description": "Updated Product Description",
    "price": 29.99,
    "quantity": 75,
    "created_at": "2023-08-03 12:34:56",
    "updated_at": "2023-08-03 13:45:12"
  }
}
```

#### 4. Delete a Product

```
DELETE /products/{product_id}
```

**Purpose:** Delete a product from the database.

**Response Format**
```json
{
  "message": "Product deleted successfully"
}
```

#### 5. Get All Products

```
GET /products
```

**Purpose:** Fetch a list of all products.

**Response Format**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Product Name",
      "description": "Product Description",
      "price": 25.99,
      "quantity": 100,
      "created_at": "2023-08-03 12:34:56",
      "updated_at": "2023-08-03 12:34:56"
    },
    // More products...
  ]
}
```

#### 6. Get a Single Product

```
GET /products/{product_id}
```

**Purpose:** Fetch details of a single product.

**Response Format**
```json
{
  "data": {
    "id": 1,
    "name": "Product Name",
    "description": "Product Description",
    "price": 25.99,
    "quantity": 100,
    "created_at": "2023-08-03 12:34:56",
    "updated_at": "2023-08-03 12:34:56"
  }
}
```