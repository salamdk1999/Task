<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication Routes
Route::group(['controller' => AuthController::class], function () {
    Route::post('register', 'register'); // User registration
    Route::post('login', 'login'); // User login
});

// User Routes
Route::apiResource('user', UserController::class); // CRUD operations for users

// Protected Routes (require authentication)
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('product/{slug}', [ProductController::class, 'showBySlug']); // Get product by slug
    Route::apiResource('products', ProductController::class); // CRUD operations for products
});