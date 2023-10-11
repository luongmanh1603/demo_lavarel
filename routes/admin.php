<?php
Route::get("/dashboard", [\App\Http\Controllers\AdminController::class, "dashboard"]);
Route::get("/detail-order/{order:id}", [\App\Http\Controllers\AdminController::class, "detail_order"]);
Route::get("/product", [\App\Http\Controllers\AdminController::class, "product"]);
Route::get("product/create", [\App\Http\Controllers\AdminController::class, "create"]);
Route::post("product/create", [\App\Http\Controllers\AdminController::class, "store"]);


Route::get("/order", [\App\Http\Controllers\AdminController::class, "orders"]);
