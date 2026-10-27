@props(['product'])

<div class="bg-surface rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
    {{-- Product Image Container --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-primary/5 to-accent/10 aspect-square flex items-center justify-center">
        {{-- Placeholder Image with SVG --}}
        <svg class="w-3/4 h-3/4 text-primary/20 group-hover:scale-110 transition-transform duration-300" 
             viewBox="0 0 200 300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            {{-- Bottle Cap --}}
            <rect x="75" y="20" width="50" height="30" rx="5" fill="currentColor" opacity="0.8"/>
            <rect x="70" y="45" width="60" height="15" rx="3" fill="currentColor" opacity="0.9"/>
            
            {{-- Bottle Neck --}}
            <path d="M 85 60 L 85 90 L 115 90 L 115 60 Z" fill="currentColor" opacity="0.7"/>
            
            {{-- Bottle Body --}}
            <path d="M 60 90 L 60 240 Q 60 260 80 260 L 120 260 Q 140 260 140 240 L 140 90 Z" fill="currentColor" opacity="0.6"/>
            
            {{-- Liquid Inside --}}
            <path d="M 70 180 L 70 240 Q 70 255 85 255 L 115 255 Q 130 255 130 240 L 130 180 Z" class="text-accent" fill="currentColor" opacity="0.4"/>
            
            {{-- Shine Effect --}}
            <ellipse cx="90" cy="120" rx="8" ry="25" fill="white" opacity="0.3"/>
        </svg>

        {{-- Status Badge --}}
        @if($product['status'] === 'available')
            <div class="absolute top-3 right-3 bg-status-success text-white px-3 py-1 rounded-full text-xs font-semibold">
                Tersedia
            </div>
        @elseif($product['status'] === 'low_stock')
            <div class="absolute top-3 right-3 bg-status-warning text-white px-3 py-1 rounded-full text-xs font-semibold">
                Stok Terbatas
            </div>
        @else
            <div class="absolute top-3 right-3 bg-status-danger text-white px-3 py-1 rounded-full text-xs font-semibold">
                Habis
            </div>
        @endif

        {{-- Hover Overlay with CTA --}}
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
            <a href="#" class="px-6 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dark transition-colors">
                Lihat Detail
            </a>
        </div>
    </div>

    {{-- Product Info --}}
    <div class="p-4 space-y-3">
        {{-- Brand --}}
        <p class="text-xs font-semibold text-primary uppercase tracking-wider">
            {{ $product['brand'] }}
        </p>

        {{-- Product Name --}}
        <h3 class="text-lg font-bold text-text-main line-clamp-2 hover:text-primary transition-colors">
            {{ $product['name'] }}
        </h3>

        {{-- Size & Volume --}}
        <p class="text-sm text-text-muted">
            {{ $product['size'] }} ML
        </p>

        {{-- Price Section --}}
        <div class="border-t border-border-custom pt-3 flex items-center justify-between">
            <span class="text-2xl font-bold text-primary">
                Rp{{ number_format($product['price'], 0, ',', '.') }}
            </span>
            @if($product['original_price'] && $product['original_price'] > $product['price'])
                <span class="text-sm text-text-muted line-through">
                    Rp{{ number_format($product['original_price'], 0, ',', '.') }}
                </span>
            @endif
        </div>

        {{-- Add to Cart / Contact Button --}}
        <button class="w-full mt-3 px-4 py-2 bg-primary/10 text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Hubungi Toko
        </button>
    </div>
</div>
