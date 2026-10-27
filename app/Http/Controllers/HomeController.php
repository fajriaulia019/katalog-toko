<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Produk Baru: dibuat dalam 14 hari terakhir, status available
        $newProducts = Product::recentlyAdded(14)->limit(4)->get();

        // Best Seller: is_best_seller = true, status available
        $bestSellers = Product::bestSeller()->limit(4)->get();

        return view('welcome', compact('newProducts', 'bestSellers'));
    }
}
