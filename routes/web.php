<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class,"home"]);
Route::get('/category/{category:slug}', [\App\Http\Controllers\HomeController::class,"category"]);
Route::get('/detail/{product:slug}', [\App\Http\Controllers\HomeController::class,"product"]);
Route::get('/add-to-cart/{product}', [\App\Http\Controllers\HomeController::class,"addToCart"]);
Route::get('/cart', [\App\Http\Controllers\HomeController::class,"cart"]);
Route::get('/checkout', [\App\Http\Controllers\HomeController::class,"checkout"]);
Route::post('/checkout', [\App\Http\Controllers\HomeController::class,"placeOrder"]);


Route::get('test', [\App\Http\Controllers\HomeController::class,"test"]);


