<?php

namespace App\Managers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryManager
{
    public function createCategory(CategoryRequest $request): Category
    {
        $category = Category::create($request->all());

        return $category;
    }
    public function getCategories(): Collection
    {
        $categories = Category::query()->get();

        return $categories;
    }
    public function updateCategory(CategoryRequest $request, Category $category): Category
    {
        $category->update($request->all());

        return $category;
    }
    public function deleteCategory(Category $category): void
    {
        $category->delete();
    }

}
