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

    {{-- Product Count Bar --}}
    <div class="bg-surface border-b border-border-custom py-4">
        <div class="container mx-auto px-4">
            <p class="text-sm text-text-muted">
                Menampilkan <span
                    class="font-semibold text-text-main">{{ $products->firstItem() }}–{{ $products->lastItem() }}</span>
                dari <span class="font-semibold text-text-main">{{ $products->total() }}</span> produk
            </p>
        </div>
    </div>

    {{-- Product Grid --}}
    <div class="bg-bg py-12">
        <div class="container mx-auto px-4">
            @if($products->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>

                {{-- Laravel Pagination --}}
                <div class="mt-12 flex justify-center">
                    {{ $products->links() }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-20">
                    <svg class="w-24 h-24 text-text-muted/30 mx-auto mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-text-main mb-2">Belum Ada Produk</h3>
                    <p class="text-text-muted">Produk sedang disiapkan, silakan kembali lagi nanti.</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Call to Action --}}
    <div class="bg-gradient-to-br from-primary to-primary-dark text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Butuh Bantuan Memilih Parfum?</h2>
            <p class="text-lg mb-8 text-white/90">Tim kami siap membantu Anda menemukan aroma yang sempurna</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#"
                    class="px-8 py-4 bg-white text-primary font-semibold rounded-lg hover:bg-accent hover:text-white transition-all duration-300 shadow-lg">
                    Hubungi Kami
                </a>
                <a href="#"
                    class="px-8 py-4 bg-primary-dark/50 backdrop-blur-sm text-white font-semibold rounded-lg border-2 border-white/30 hover:bg-white/10 transition-all duration-300">
                    Kunjungi Toko
                </a>
            </div>
        </div>
    </div>
@endsection