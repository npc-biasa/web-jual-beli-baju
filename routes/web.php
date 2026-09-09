<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'utama.landing-page')->name('home');

Route::view('/new', 'utama.new')->name('new');

Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

Route::view('/manage-orders', 'admin.manage-order')->name('manage-orders');

Route::view('/products-catalog', 'admin.products-catalog')->name('products-catalog');
