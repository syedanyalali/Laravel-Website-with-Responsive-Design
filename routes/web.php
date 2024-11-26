<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/products', function () {
    return view('pages.products');
})->name('products');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');


// Display all products (index)
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');

// Show form to create a new product
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');

// Store the newly created product
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');

// Show form to edit an existing product
Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Update the existing product
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Delete an existing product
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
