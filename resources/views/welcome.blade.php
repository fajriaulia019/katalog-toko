@extends('layouts.public')

@section('content')
    {{-- Hero Section --}}
    <div
        class="relative bg-gradient-to-br from-primary-light via-bg to-surface overflow-hidden min-h-screen flex items-center">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 right-20 w-72 h-72 bg-accent rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-96 h-96 bg-primary rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 pt-28 pb-20 md:pt-32 md:pb-24 relative w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
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

                <div class="relative">
                    <div class="relative bg-white/40 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/60">
                        <div
                            class="aspect-square bg-gradient-to-br from-primary/10 to-accent/20 rounded-2xl flex items-center justify-center relative overflow-hidden">
                            <svg class="w-2/3 h-2/3 text-primary/30" viewBox="0 0 200 300" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="75" y="20" width="50" height="30" rx="5" fill="currentColor" opacity="0.8" />
                                <rect x="70" y="45" width="60" height="15" rx="3" fill="currentColor" opacity="0.9" />
                                <path d="M 85 60 L 85 90 L 115 90 L 115 60 Z" fill="currentColor" opacity="0.7" />
                                <path d="M 60 90 L 60 240 Q 60 260 80 260 L 120 260 Q 140 260 140 240 L 140 90 Z"
                                    fill="currentColor" opacity="0.6" />
                                <path d="M 70 180 L 70 240 Q 70 255 85 255 L 115 255 Q 130 255 130 240 L 130 180 Z"
                                    class="text-accent" fill="currentColor" opacity="0.4" />
                                <ellipse cx="90" cy="120" rx="8" ry="25" fill="white" opacity="0.3" />
                            </svg>
                            <div class="absolute -top-4 -right-4 w-24 h-24 bg-accent/20 rounded-full blur-xl"></div>
                            <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary/20 rounded-full blur-xl"></div>
                        </div>
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

    {{-- =========================================================
    Produk Baru (dari database, 14 hari terakhir)
    ========================================================== --}}
    @if($newProducts->isNotEmpty())
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

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($newProducts as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- =========================================================
    Best Seller (dari database, is_best_seller = true)
    ========================================================== --}}
    @if($bestSellers->isNotEmpty())
        <div class="bg-surface py-16">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <span class="text-accent font-semibold tracking-wider uppercase text-sm">Paling Dicari</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-primary-dark mt-2">Produk Best Seller</h2>
                    <p class="text-text-muted mt-4 max-w-2xl mx-auto">
                        Koleksi parfum terlaris yang menjadi favorit pelanggan kami.
                    </p>
                </div>

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
    @endif

    <section class="bg-bg py-16">
        <div class="container mx-auto px-4">
            <div class="grid gap-8 rounded-3xl bg-primary-dark px-6 py-10 text-white sm:px-10 lg:grid-cols-[1.2fr_1fr] lg:items-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-accent">Kunjungi Toko Kami</p>
                    <h2 class="mt-3 text-3xl font-bold">Temukan aroma yang paling cocok untuk Anda.</h2>
                    <p class="mt-4 max-w-2xl leading-7 text-white/75">Butuh rekomendasi atau ingin mencoba langsung? Kami siap membantu Anda memilih parfum terbaik.</p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:justify-end">
                    <a href="{{ route('about') }}#kontak" class="inline-flex items-center justify-center rounded-xl bg-white px-6 py-3 font-semibold text-primary hover:bg-primary-light">Alamat & Jam Buka</a>
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl border border-white/30 px-6 py-3 font-semibold text-white hover:bg-white/10">Hubungi WhatsApp</a>
                </div>
            </div>
        </div>
    </section>

@endsection
