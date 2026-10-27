@extends('layouts.public')

@section('content')
{{-- Page Header --}}
<div class="bg-gradient-to-br from-primary-light/30 via-bg to-surface pt-32 pb-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold text-primary-dark mb-4">
                Katalog Parfum
            </h1>
            <p class="text-lg text-text-muted">
                Jelajahi koleksi lengkap parfum eksklusif kami. Temukan aroma yang sempurna untuk setiap momen.
            </p>
        </div>
    </div>
</div>

{{-- Search & Filter Section --}}
<div class="bg-surface border-b border-border-custom py-6">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            {{-- Search Box --}}
            <div class="w-full md:w-96">
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari nama parfum atau brand..." 
                           class="w-full pl-10 pr-4 py-3 border border-border-custom rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    <svg class="absolute left-3 top-3.5 w-5 h-5 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>

            {{-- Filter & Sort --}}
            <div class="flex gap-3 w-full md:w-auto">
                {{-- Filter Button --}}
                <button class="flex-1 md:flex-none px-6 py-3 bg-white border border-border-custom rounded-lg font-medium text-text-main hover:bg-primary-light/20 transition-colors flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    Filter
                </button>
                
                {{-- Sort Dropdown --}}
                <select class="flex-1 md:flex-none px-6 py-3 bg-white border border-border-custom rounded-lg font-medium text-text-main hover:bg-primary-light/20 transition-colors focus:outline-none focus:ring-2 focus:ring-primary">
                    <option>Urutkan</option>
                    <option>Harga: Terendah</option>
                    <option>Harga: Tertinggi</option>
                    <option>Nama: A-Z</option>
                    <option>Terbaru</option>
                </select>
            </div>
        </div>

        {{-- Active Filters (if any) --}}
        <div class="mt-4 flex flex-wrap gap-2">
            <span class="text-sm text-text-muted">Menampilkan {{ count($products) }} produk</span>
        </div>
    </div>
</div>

{{-- Product Grid --}}
<div class="bg-bg py-12">
    <div class="container mx-auto px-4">
        @if(count($products) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12 flex justify-center">
                <div class="flex items-center gap-2">
                    <button class="px-4 py-2 border border-border-custom rounded-lg text-text-muted hover:bg-surface transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    
                    <button class="px-4 py-2 bg-primary text-white rounded-lg font-semibold">1</button>
                    <button class="px-4 py-2 border border-border-custom rounded-lg text-text-main hover:bg-surface transition-colors">2</button>
                    <button class="px-4 py-2 border border-border-custom rounded-lg text-text-main hover:bg-surface transition-colors">3</button>
                    
                    <button class="px-4 py-2 border border-border-custom rounded-lg text-text-main hover:bg-surface transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center py-20">
                <svg class="w-24 h-24 text-text-muted/30 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-xl font-semibold text-text-main mb-2">Tidak Ada Produk</h3>
                <p class="text-text-muted">Maaf, tidak ada produk yang sesuai dengan pencarian Anda.</p>
            </div>
        @endif
    </div>
</div>

{{-- Call to Action Section --}}
<div class="bg-gradient-to-br from-primary to-primary-dark text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Butuh Bantuan Memilih Parfum?</h2>
        <p class="text-lg mb-8 text-white/90">Tim kami siap membantu Anda menemukan aroma yang sempurna</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="#" class="px-8 py-4 bg-white text-primary font-semibold rounded-lg hover:bg-accent hover:text-white transition-all duration-300 shadow-lg">
                Hubungi Kami
            </a>
            <a href="#" class="px-8 py-4 bg-primary-dark/50 backdrop-blur-sm text-white font-semibold rounded-lg border-2 border-white/30 hover:bg-white/10 transition-all duration-300">
                Kunjungi Toko
            </a>
        </div>
    </div>
</div>
@endsection
