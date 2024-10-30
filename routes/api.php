<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('products/filter/category', [ProductController::class, 'filterByCategory']);
    Route::get('products/filter/name', [ProductController::class, 'filterByName']);
    Route::apiResource('products', ProductController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// route logout agar bisa remove token must include middleware auth:sanctum