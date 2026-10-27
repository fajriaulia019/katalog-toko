<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $newProducts = Product::recentlyAdded(14)->limit(4)->get();

        $bestSellers = Product::bestSeller()->limit(4)->get();

        return view('welcome', compact('newProducts', 'bestSellers'));
    }
}
