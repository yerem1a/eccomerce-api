# E-Commerce Product API

This is a simple Laravel-based API for managing products in an e-commerce application. The API allows for CRUD (Create, Read, Update, Delete) operations on products.

## Features

- **Create** a new product.
- **Read** the list of all products or a specific product by ID.
- **Update** an existing product.
- **Delete** a product by ID.

## Requirements

- PHP >= 7.4
- Laravel >= 8.x
- Composer
- MySQL or SQLite

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/ecommerce-product-api.git

2. Navigate to the project directory:
```bash
    cd ecommerce-product-api

3. Install the dependencies using Composer:
```bash
    composer install

4. Set up the .env file by copying the .env.example file:
```bash
    cp .env.example .env

5. Generate the application key:
```bash
    php artisan key:generate

5. Generate the application key:
```bash
    php artisan key:generate

6. Set up the database in .env file:

7. Run database migrations:
```bash
    php artisan migrate

8. Start the Laravel development server:
```bash
php artisan serve
