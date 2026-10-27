<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CatalogController extends Controller
{
    /**
     * Halaman katalog publik — tampilkan semua produk yang masih dijual.
     * Status: available + out_of_stock (published scope).
     */
    public function __invoke()
    {
        $products = Product::published()
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('catalog', compact('products'));
    }
}
