<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Dummy products data for testing catalog view
        $products = [
            [
                'id' => 1,
                'name' => 'Eternal Rose Eau de Parfum',
                'brand' => 'Maison Lumière',
                'size' => 50,
                'price' => 1250000,
                'original_price' => null,
                'status' => 'available',
                'description' => 'Aroma mawar yang elegan dengan sentuhan kayu cedar dan musk.',
            ],
            [
                'id' => 2,
                'name' => 'Ocean Breeze Pour Homme',
                'brand' => 'Azure Marine',
                'size' => 100,
                'price' => 850000,
                'original_price' => 1200000,
                'status' => 'available',
                'description' => 'Kesegaran laut dengan citrus dan akuatik yang menyegarkan.',
            ],
            [
                'id' => 3,
                'name' => 'Midnight Oud Intense',
                'brand' => 'Oriental Luxe',
                'size' => 75,
                'price' => 2100000,
                'original_price' => null,
                'status' => 'low_stock',
                'description' => 'Oud kaya dengan rempah-rempah dan amber yang mewah.',
            ],
            [
                'id' => 4,
                'name' => 'Citrus Garden Fresh',
                'brand' => 'Green Valley',
                'size' => 50,
                'price' => 650000,
                'original_price' => null,
                'status' => 'available',
                'description' => 'Citrus segar dengan basil dan mint untuk kesegaran sepanjang hari.',
            ],
            [
                'id' => 5,
                'name' => 'Velvet Jasmine Noir',
                'brand' => 'Nuit Élégante',
                'size' => 100,
                'price' => 1750000,
                'original_price' => 2000000,
                'status' => 'available',
                'description' => 'Jasmine misterius dengan vanilla dan patchouli.',
            ],
            [
                'id' => 6,
                'name' => 'Amber Woods Classic',
                'brand' => 'Heritage Scents',
                'size' => 75,
                'price' => 980000,
                'original_price' => null,
                'status' => 'out_of_stock',
                'description' => 'Kayu cedar dan amber dengan sentuhan leather yang maskulin.',
            ],
            [
                'id' => 7,
                'name' => 'Blossom Dream Eau Fraîche',
                'brand' => 'Spring Garden',
                'size' => 50,
                'price' => 580000,
                'original_price' => null,
                'status' => 'available',
                'description' => 'Bunga cherry blossom dengan peony dan freesia yang ringan.',
            ],
            [
                'id' => 8,
                'name' => 'Spice Route Explorer',
                'brand' => 'Voyager Collection',
                'size' => 100,
                'price' => 1450000,
                'original_price' => null,
                'status' => 'low_stock',
                'description' => 'Rempah-rempah eksotis dengan cardamom, saffron, dan sandalwood.',
            ],
            [
                'id' => 9,
                'name' => 'White Musk Serenity',
                'brand' => 'Pure Essence',
                'size' => 50,
                'price' => 720000,
                'original_price' => null,
                'status' => 'available',
                'description' => 'Musk putih yang lembut dengan cotton dan lily of the valley.',
            ],
            [
                'id' => 10,
                'name' => 'Leather & Tobacco Exclusive',
                'brand' => 'Gentleman\'s Club',
                'size' => 75,
                'price' => 1850000,
                'original_price' => null,
                'status' => 'available',
                'description' => 'Leather mewah dengan tobacco dan rum untuk pria yang percaya diri.',
            ],
            [
                'id' => 11,
                'name' => 'Lavender Fields Calm',
                'brand' => 'Provence Natural',
                'size' => 100,
                'price' => 890000,
                'original_price' => 950000,
                'status' => 'available',
                'description' => 'Lavender aromaterapi dengan chamomile dan bergamot yang menenangkan.',
            ],
            [
                'id' => 12,
                'name' => 'Golden Saffron Royale',
                'brand' => 'Imperial Essence',
                'size' => 50,
                'price' => 2500000,
                'original_price' => null,
                'status' => 'low_stock',
                'description' => 'Saffron emas dengan rose dan oud untuk kemewahan sejati.',
            ],
        ];

        return view('catalog', ['products' => $products]);
    }
}
