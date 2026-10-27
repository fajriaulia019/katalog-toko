<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class CatalogController extends Controller
{
    /**
     * Halaman katalog publik — tampilkan semua produk yang masih dijual.
     * Status: available + out_of_stock (published scope).
     */
    public function __invoke(): View
    {
        $products = Product::published()
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('catalog', compact('products'));
    }
}
