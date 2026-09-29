<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/produk/{product}', [ProductController::class, 'show'])->name('produk.detail');
Route::post('/produk/{product}/keranjang', [ProductController::class, 'addToCart'])->name('produk.keranjang');
Route::get('/keranjang', [ProductController::class, 'cart'])->name('keranjang');

Route::middleware('guest')->group(function () {
	Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
	Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
	Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
	Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
});
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
	Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
	Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.process');
});

Route::get('/new', [ProductController::class, 'index'])->name('new');

Route::middleware(['auth', 'admin'])->group(function () {
	Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
	Route::get('/products', [ProductAdminController::class, 'index'])->name('products.index');
	Route::get('/products/create', [ProductAdminController::class, 'create'])->name('products.create');
	Route::post('/products', [ProductAdminController::class, 'store'])->name('products.store');
	Route::view('/manage-orders', 'admin.manage-order')->name('manage-orders');
});

Route::redirect('/admin/dashboard', '/dashboard')->middleware(['auth', 'admin']);
Route::redirect('/admin/products-catalog', '/products');
Route::redirect('/admin/manage-orders', '/admin/manage-orders');
