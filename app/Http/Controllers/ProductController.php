<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Halaman detail produk publik.
     */
    public function show(Product $product)
    {
        // Produk discontinued tidak bisa diakses via URL langsung
        abort_if($product->status === 'discontinued', 404);

        return view('product.show', compact('product'));
    }
}
