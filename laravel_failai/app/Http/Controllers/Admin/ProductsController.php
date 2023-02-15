<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Managers\FileManager;
use App\Managers\ProductManager;
use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct(protected ProductManager $manager, protected FileManager $fileManager)
    {
    }

    public function index()
    {
        $products = $this->manager->getProducts();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = $this->manager->createProduct($request);
        $file = $this->fileManager->saveFile($request, 'foto', 'img/products');
        // Ši kodo dalis atsakinga uz paveiksliuko isaugojima produkto lenteleje
        $product->image = $file->url;
        $product->save();

        return redirect()->route('products.show', $product);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product = $this->manager->updateProduct($request, $product);
        // Paimti sena paveiksla ir istrinti ji is serverio
        // $this->fileManager->removeFile($product->image, ??, ??);
        $file = $this->fileManager->saveFile($request, 'image', 'img/products');
        // Ši kodo dalis atsakinga uz paveiksliuko isaugojima produkto lenteleje
        $product->image = $file->url;
        $product->save();


        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        $this->manager->deleteProduct($product);
        return redirect()->route('products.index');
    }

}
