<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/katalog', CatalogController::class)->name('catalog');

Route::get('/produk/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/tentang-kami', function () {
    return view('pages.about');
})->name('about');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});

Route::post('/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('products', AdminProductController::class)->except('show');
});
