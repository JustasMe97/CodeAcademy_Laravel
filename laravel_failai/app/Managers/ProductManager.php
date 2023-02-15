<?php

namespace App\Managers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductManager
{
    public function createProduct(ProductRequest $request): Product
    {
        $product = Product::create($request->all());

        return $product;
    }
    public function getProducts(): Collection
    {
        $products = Product::query()->with(['category', 'status'])->get();

        return $products;
    }
    public function updateProduct(ProductRequest $request, Product $product): Product
    {
        $product->update($request->all());

        return $product;
    }
    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }
    public function getLatestProducts(): Collection
    {
        $products = Product::latest()->take(5)->get();
        return $products;
    }
}

