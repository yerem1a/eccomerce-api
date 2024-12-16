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
        return response()->json(['message' => 'Product created successfully', 'product' => $product,201]);
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
