<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Halaman detail produk publik.
     */
    public function show(Product $product): View
    {
        abort_unless($product->is_published, 404);

        return view('product.show', compact('product'));
    }
}
