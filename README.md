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
Navigate to the project directory:

bash
Copy code
cd ecommerce-product-api
Install the dependencies using Composer:

bash
Copy code
composer install
Set up the .env file by copying the .env.example file:

bash
Copy code
cp .env.example .env
Generate the application key:

bash
Copy code
php artisan key:generate
Set up the database in .env file:

Update the database connection settings (e.g., DB_DATABASE, DB_USERNAME, and DB_PASSWORD).
Run database migrations:

bash
Copy code
php artisan migrate
(Optional) Seed the database with some example products:

bash
Copy code
php artisan db:seed
Start the Laravel development server:

bash
Copy code
php artisan serve
The API will be available at http://localhost:8000.

API Endpoints
1. Get All Products
URL: /api/products
Method: GET
Response:
json
Copy code
[
  {
    "id": 1,
    "name": "Product 1",
    "description": "Description of product 1",
    "price": 100,
    "stock": 50
  },
  {
    "id": 2,
    "name": "Product 2",
    "description": "Description of product 2",
    "price": 200,
    "stock": 30
  }
]
2. Get a Single Product
URL: /api/products/{id}
Method: GET
Response:
json
Copy code
{
  "id": 1,
  "name": "Product 1",
  "description": "Description of product 1",
  "price": 100,
  "stock": 50
}
3. Create a Product
URL: /api/products
Method: POST
Request Body:
json
Copy code
{
  "name": "New Product",
  "description": "Description of new product",
  "price": 150,
  "stock": 25
}
Response:
json
Copy code
{
  "message": "Product created successfully",
  "product": {
    "id": 3,
    "name": "New Product",
    "description": "Description of new product",
    "price": 150,
    "stock": 25
  }
}
4. Update a Product
URL: /api/products/{id}
Method: PUT
Request Body:
json
Copy code
{
  "name": "Updated Product",
  "description": "Updated description",
  "price": 180,
  "stock": 40
}
Response:
json
Copy code
{
  "message": "Product updated successfully",
  "product": {
    "id": 3,
    "name": "Updated Product",
    "description": "Updated description",
    "price": 180,
    "stock": 40
  }
}
5. Delete a Product
URL: /api/products/{id}
Method: DELETE
Response:
json
Copy code
{
  "message": "Product deleted successfully"
}
Authentication
This API doesn't include authentication or authorization at the moment, but you can implement JWT authentication or OAuth as needed.

Controller Code Example
php
Copy code
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // function index 
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // function store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($validatedData);
        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    // function show  
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // function update  
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($validatedData);

        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
    }

    // function delete  
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
License
This project is licensed under the MIT License - see the LICENSE file for details.

Acknowledgments
Laravel Framework
Composer for PHP dependency management
MySQL for the database
markdown
Copy code

### Penjelasan:

1. **Installation**: Panduan langkah demi langkah untuk menginstal dan menjalankan aplikasi.
2. **API Endpoints**: Deskripsi lengkap mengenai setiap endpoint API yang tersedia, termasuk metode HTTP, body request, dan contoh respons.
3. **Controller Code**: Kode PHP dari controller `ProductController` yang mengimplementasikan CRUD.
4. **Authentication**: Menyebutkan bahwa otentikasi tidak diterapkan di sini, namun Anda bisa menambahkannya sesuai kebutuhan.
5. **License**: Menyebutkan lisensi MIT untuk proyek ini.
