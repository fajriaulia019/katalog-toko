@props(['product', 'showBadge' => null])

@php
    // Support both Eloquent model and array (backward compat)
    $isModel = is_object($product);
    $name = $isModel ? $product->name : $product['name'];
    $brand = $isModel ? $product->brand : $product['brand'];
    $size = $isModel ? $product->size : $product['size'];
    $price = $isModel ? $product->price : $product['price'];
    $status = $isModel ? $product->status : ($product['status'] ?? 'available');
    $imagePath = $isModel ? ($product->image_path ?? null) : null;
    $isBestSeller = $isModel ? $product->is_best_seller : false;
    $productId = $isModel ? $product->id : null;
@endphp

<div class="bg-surface rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group">
    {{-- Product Image Container --}}
    <div
        class="relative overflow-hidden bg-gradient-to-br from-primary/5 to-accent/10 aspect-square flex items-center justify-center">
        @if($imagePath)
            <img src="{{ asset('storage/' . $imagePath) }}" alt="{{ $name }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @else
            {{-- Placeholder SVG Perfume Bottle --}}
            <svg class="w-3/4 h-3/4 text-primary/20 group-hover:scale-110 transition-transform duration-300"
                viewBox="0 0 200 300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <rect x="75" y="20" width="50" height="30" rx="5" fill="currentColor" opacity="0.8" />
                <rect x="70" y="45" width="60" height="15" rx="3" fill="currentColor" opacity="0.9" />
                <path d="M 85 60 L 85 90 L 115 90 L 115 60 Z" fill="currentColor" opacity="0.7" />
                <path d="M 60 90 L 60 240 Q 60 260 80 260 L 120 260 Q 140 260 140 240 L 140 90 Z" fill="currentColor"
                    opacity="0.6" />
                <path d="M 70 180 L 70 240 Q 70 255 85 255 L 115 255 Q 130 255 130 240 L 130 180 Z" class="text-accent"
                    fill="currentColor" opacity="0.4" />
                <ellipse cx="90" cy="120" rx="8" ry="25" fill="white" opacity="0.3" />
            </svg>
        @endif

        {{-- Best Seller Badge --}}
        @if($isBestSeller)
            <div
                class="absolute top-3 left-3 bg-amber-500 text-white px-2 py-1 rounded-full text-xs font-bold flex items-center gap-1">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                Best Seller
            </div>
        @endif

        {{-- Status Badge --}}
        @if($status === 'available')
            <div class="absolute top-3 right-3 bg-status-success text-white px-3 py-1 rounded-full text-xs font-semibold">
                Tersedia
            </div>
        @elseif($status === 'out_of_stock')
            <div class="absolute top-3 right-3 bg-status-warning text-white px-3 py-1 rounded-full text-xs font-semibold">
                Habis
            </div>
        @else
            <div class="absolute top-3 right-3 bg-status-danger text-white px-3 py-1 rounded-full text-xs font-semibold">
                Tidak Dijual
            </div>
        @endif

        {{-- Hover Overlay --}}
        @if($productId)
            <div
                class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                <a href="{{ route('product.show', $productId) }}"
                    class="px-6 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dark transition-colors">
                    Lihat Detail
                </a>
            </div>
        @endif
    </div>

    {{-- Product Info --}}
    <div class="p-4 space-y-2">
        <p class="text-xs font-semibold text-primary uppercase tracking-wider">{{ $brand }}</p>

        <h3 class="text-base font-bold text-text-main line-clamp-2">{{ $name }}</h3>

        <p class="text-sm text-text-muted">{{ $size }}</p>

        <div class="border-t border-border-custom pt-3 flex items-center justify-between">
            <span class="text-xl font-bold text-primary">
                Rp{{ number_format((float) $price, 0, ',', '.') }}
            </span>
        </div>

        {{-- Tombol Hubungi Toko --}}
        <a href="{{ route('catalog') }}"
            class="block w-full text-center mt-1 px-4 py-2 bg-primary/10 text-primary rounded-lg font-semibold hover:bg-primary hover:text-white transition-all duration-300">
            Lihat Detail
        </a>
    </div>
</div>