<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::query()->orderby('title')->get();

        return CategoryResource::collection($categories);
    }

    public function store(StoreCategoryRequest $request) {
        $category = Category::create($request->validated());
        
        return new CategoryResource($category);
    }

    public function update(StoreCategoryRequest $request, Category $category) {
        $category->update($request->validated());
        
        return new CategoryResource($category);
    }

    public function destroy(Category $category) {
        $category->tickets()->detach();
        $category->delete();
        return response()->json(['message' => "Succesfully deleted"]);
    }
}
