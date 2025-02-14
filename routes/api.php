<?php

use Illuminate\Http\Request;
use App\Models\CateringTestimonial;
use App\Models\CateringSubscription;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CateringPackageController;
use App\Http\Controllers\Api\CateringTestimonialController;
use App\Http\Controllers\Api\CateringSubscriptionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// catering-packages/blabla
// public function showData()
Route::get('/catering-package/{cateringPackage:slug}', [CateringPackageController::class, 'show']);

// .index, .create, .show, .store, .update, .destroy, etc..
Route::apiResource('/catering-packages', CateringPackageController::class);

Route::get('/filters/catering-packages', [CategoryController::class, 'filterPackages']);

Route::get('/category/{category:slug}', [CategoryController::class, 'show']);
Route::apiResource('/categories', CategoryController::class);

Route::get('/city/{city:slug}', [CityController::class, 'show']);
Route::apiResource('/cities', CityController::class);

Route::apiResource('/testimonials', CateringTestimonialController::class);

Route::post('/booking-transaction', [CateringSubscriptionController::class, 'store']);
Route::post('/check-booking', [CateringSubscriptionController::class, 'booking_details']);
