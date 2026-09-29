<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/produk/{product}', [ProductController::class, 'show'])->name('produk.detail');
Route::post('/produk/{product}/keranjang', [ProductController::class, 'addToCart'])->name('produk.keranjang');
Route::get('/keranjang', [ProductController::class, 'cart'])->name('keranjang');

Route::view('/checkout', 'utama.checkout')->name('checkout');
Route::post('/checkout', [ProductController::class, 'placeOrder'])->name('checkout.process');

Route::get('/new', [ProductController::class, 'index'])->name('new');

Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

Route::view('/manage-orders', 'admin.manage-order')->name('manage-orders');

Route::view('/products-catalog', 'admin.products-catalog')->name('products-catalog');
