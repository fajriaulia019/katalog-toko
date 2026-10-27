<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/katalog', CatalogController::class)->name('catalog');

Route::get('/tentang-kami', function () {
    return view('pages.about');
})->name('about');
