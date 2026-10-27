@extends('layouts.public')

@section('content')
    {{-- Hero Section --}}
    <div
        class="relative bg-gradient-to-br from-primary-light via-bg to-surface overflow-hidden min-h-screen flex items-center">
        {{-- Background Decorative Elements --}}
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 right-20 w-72 h-72 bg-accent rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-primary rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 pt-28 pb-20 md:pt-32 md:pb-24 relative w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Left Content --}}
                <div class="space-y-6">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-primary-dark leading-tight">
                        Katalog Parfum Eksklusif
                    </h1>
                    <p class="text-lg md:text-xl text-text-muted leading-relaxed">
                        Temukan aroma terbaik untuk menyempurnakan hari Anda. Jelajahi koleksi lengkap kami.
                    </p>
                    <div class="flex gap-4 flex-wrap pt-4">
                        <a href="{{ route('catalog') }}"
                            class="px-8 py-4 bg-primary text-white font-semibold rounded-lg shadow-lg hover:bg-primary-dark hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            Lihat Produk Kami
                        </a>
                        <a href="{{ route('about') }}"
                            class="px-8 py-4 bg-surface text-primary font-semibold rounded-lg border-2 border-primary hover:bg-primary-light/30 transition-all duration-300 shadow-md">
                            Tentang Kami
                        </a>
                    </div>
                </div>

                {{-- Right Image --}}
                <div class="relative">
                    {{-- Glassmorphism Card Effect --}}
                    <div class="relative bg-white/40 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/60">
                        {{-- Dummy Perfume Image Placeholder --}}
                        <div
                            class="aspect-square bg-gradient-to-br from-primary/10 to-accent/20 rounded-2xl flex items-center justify-center relative overflow-hidden">
                            {{-- SVG Perfume Bottle Illustration --}}
                            <svg class="w-2/3 h-2/3 text-primary/30" viewBox="0 0 200 300" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                {{-- Bottle Cap --}}
                                <rect x="75" y="20" width="50" height="30" rx="5" fill="currentColor" opacity="0.8" />
                                <rect x="70" y="45" width="60" height="15" rx="3" fill="currentColor" opacity="0.9" />

                                {{-- Bottle Neck --}}
                                <path d="M 85 60 L 85 90 L 115 90 L 115 60 Z" fill="currentColor" opacity="0.7" />

                                {{-- Bottle Body --}}
                                <path d="M 60 90 L 60 240 Q 60 260 80 260 L 120 260 Q 140 260 140 240 L 140 90 Z"
                                    fill="currentColor" opacity="0.6" />

                                {{-- Liquid Inside --}}
                                <path d="M 70 180 L 70 240 Q 70 255 85 255 L 115 255 Q 130 255 130 240 L 130 180 Z"
                                    class="text-accent" fill="currentColor" opacity="0.4" />

                                {{-- Shine Effect --}}
                                <ellipse cx="90" cy="120" rx="8" ry="25" fill="white" opacity="0.3" />
                            </svg>

                            {{-- Decorative Circles --}}
                            <div class="absolute -top-4 -right-4 w-24 h-24 bg-accent/20 rounded-full blur-xl"></div>
                            <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary/20 rounded-full blur-xl"></div>
                        </div>

                        {{-- Badge --}}
                        <div
                            class="absolute -top-4 -right-4 bg-accent text-white px-4 py-2 rounded-full shadow-lg font-semibold text-sm">
                            Premium Collection
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Features Section --}}
    <div class="bg-surface py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="space-y-3">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-dark">Produk Berkualitas</h3>
                    <p class="text-text-muted">Koleksi parfum pilihan dengan kualitas terbaik</p>
                </div>

                <div class="space-y-3">
                    <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-dark">Pelayanan Cepat</h3>
                    <p class="text-text-muted">Konsultasi dan informasi produk yang responsif</p>
                </div>

                <div class="space-y-3">
                    <div class="w-16 h-16 bg-status-success/10 rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-8 h-8 text-status-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary-dark">Lokasi Strategis</h3>
                    <p class="text-text-muted">Kunjungi toko kami untuk pengalaman langsung</p>
                </div>
            </div>
        </div>
    </div>

    {{-- New Products Section --}}
    <div class="bg-bg py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <span class="text-primary font-semibold tracking-wider uppercase text-sm">Koleksi Terbaru</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-primary-dark mt-2">Produk Baru</h2>
                </div>
                <a href="{{ route('catalog') }}"
                    class="text-primary font-semibold hover:text-primary-dark transition-colors flex items-center gap-2 group">
                    Lihat Semua
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            @php
                $newProducts = [
                    [
                        'brand' => 'Luxury Scent',
                        'name' => 'Midnight Rose',
                        'size' => 100,
                        'price' => 750000,
                        'original_price' => 850000,
                        'status' => 'available'
                    ],
                    [
                        'brand' => 'Oceanic',
                        'name' => 'Deep Blue Sea',
                        'size' => 50,
                        'price' => 450000,
                        'original_price' => null,
                        'status' => 'available'
                    ],
                    [
                        'brand' => 'Floral Bloom',
                        'name' => 'Spring Garden',
                        'size' => 30,
                        'price' => 320000,
                        'original_price' => 350000,
                        'status' => 'low_stock'
                    ],
                    [
                        'brand' => 'Woody Essence',
                        'name' => 'Cedar Forest',
                        'size' => 100,
                        'price' => 680000,
                        'original_price' => null,
                        'status' => 'available'
                    ]
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($newProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>

    {{-- Best Seller Section --}}
    <div class="bg-surface py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-accent font-semibold tracking-wider uppercase text-sm">Paling Dicari</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-dark mt-2">Produk Best Seller</h2>
                <p class="text-text-muted mt-4 max-w-2xl mx-auto">Koleksi parfum terlaris yang menjadi favorit pelanggan
                    kami. Temukan aroma yang paling banyak dicintai.</p>
            </div>

            @php
                $bestSellers = [
                    [
                        'brand' => 'Elegance',
                        'name' => 'Golden Oud',
                        'size' => 100,
                        'price' => 1200000,
                        'original_price' => 1500000,
                        'status' => 'available'
                    ],
                    [
                        'brand' => 'Fresh Spirit',
                        'name' => 'Citrus Burst',
                        'size' => 50,
                        'price' => 380000,
                        'original_price' => null,
                        'status' => 'available'
                    ],
                    [
                        'brand' => 'Velvet Touch',
                        'name' => 'Vanilla Dream',
                        'size' => 100,
                        'price' => 550000,
                        'original_price' => 600000,
                        'status' => 'available'
                    ],
                    [
                        'brand' => 'Mystic',
                        'name' => 'Night Jasmine',
                        'size' => 50,
                        'price' => 420000,
                        'original_price' => null,
                        'status' => 'low_stock'
                    ]
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($bestSellers as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('catalog') }}"
                    class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white font-semibold rounded-lg shadow-lg hover:bg-primary-dark transition-all duration-300">
                    Lihat Semua Koleksi
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>



    {{-- Test Components Section --}}
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-2xl font-bold text-primary-dark mb-6">Test Design Components & Livewire</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <livewire:counter />

            <div class="bg-surface rounded-lg shadow p-6">
                <h3 class="text-xl font-semibold text-primary mb-2">Status Colors</h3>
                <div class="space-y-2">
                    <div class="text-status-success">Success: Product added</div>
                    <div class="text-status-warning">Warning: Low stock</div>
                    <div class="text-status-danger">Danger: Out of stock</div>
                </div>
            </div>

            <div class="bg-surface rounded-lg shadow p-6">
                <h3 class="text-xl font-semibold text-primary mb-2">Color Palette</h3>
                <div class="grid grid-cols-3 gap-2">
                    <div class="h-6 bg-primary rounded"></div>
                    <div class="h-6 bg-accent rounded"></div>
                    <div class="h-6 bg-bg border border-border-custom rounded"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
