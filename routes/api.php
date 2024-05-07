<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('stores', \App\Http\Controllers\Api\StoreController::class)->middleware('auth:sanctum');
Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class)->only('index')->middleware('auth:sanctum');

Route::prefix('auth')->group(function (){
   Route::post('login', [\App\Http\Controllers\Auth\Api\LoginController::class, 'login']);
   Route::post('logout', [\App\Http\Controllers\Auth\Api\LoginController::class, 'logout'])->middleware('auth:sanctum');
   Route::post('register', [\App\Http\Controllers\Auth\Api\RegisterController::class, 'register']);
});
