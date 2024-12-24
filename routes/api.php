<?php

use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;
use Illuminate\Support\Facades\Route;

// API routes for products
Route::name('api.products.')->prefix('products')->group(function () {
    Route::get('/', [ProductApiController::class, 'index'])->name('index');
    Route::post('store', [ProductApiController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ProductApiController::class, 'edit'])->name('edit');
    Route::post('update', [ProductApiController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ProductApiController::class, 'destroy'])->name('destroy');
});

// API routes for categories
Route::name('api.categories.')->prefix('categories')->group(function () {
    Route::get('/', [CategoryApiController::class, 'index'])->name('index');
    Route::post('store', [CategoryApiController::class, 'store'])->name('store');
    Route::get('edit/{id}', [CategoryApiController::class, 'edit'])->name('edit');
    Route::post('update', [CategoryApiController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [CategoryApiController::class, 'destroy'])->name('destroy');
});
