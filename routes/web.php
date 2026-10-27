<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;

Route::get('/', HomeController::class)->name('home');

Route::get('/katalog', CatalogController::class)->name('catalog');

Route::get('/produk/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/tentang-kami', function () {
    return view('pages.about');
})->name('about');
