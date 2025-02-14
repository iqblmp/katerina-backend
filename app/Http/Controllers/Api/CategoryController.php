<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryApiResource;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::with('cateringPackages')->get();
        return CategoryApiResource::collection($categories);
    }

    public function show(Category $category)
    {
        $category->load(['cateringPackages', 'cateringPackages.city', 'cateringPackages.category', 'cateringPackages.tiers']);
        $category->loadCount('cateringPackages');

        return new CategoryApiResource($category);
    }
}
