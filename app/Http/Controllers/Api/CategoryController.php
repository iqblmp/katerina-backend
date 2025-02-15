<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CateringPackage;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryApiResource;
use App\Http\Resources\Api\CateringPackageApiResource;

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

    public function filterPackages(Request $request)
    {
        $request->validate([
            'category_slug' => 'required|string',
            'city_slug' => 'required|string',
        ]);

        $category = Category::where('slug', $request->category_slug)->first();
        $city = City::where('slug', $request->city_slug)->first();


        if (!$category || !$city) {
            return response()->json([
                'message' => 'category or city not found ',
            ], 404);
        }
        $cateringPackages = CateringPackage::where('category_id', $category->id)
            ->where('city_id', $city->id)
            ->with(['city', 'kitchen', 'tiers', 'category'])
            ->get();

        return CateringPackageApiResource::collection($cateringPackages);
    }
}
