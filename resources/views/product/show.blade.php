@extends('layouts.public')

@section('content')
    @php
        $statusClasses = match ($product->status) {
            'available' => 'bg-status-success/10 text-status-success',
            'out_of_stock' => 'bg-status-warning/10 text-status-warning',
            default => 'bg-status-danger/10 text-status-danger',
        };
    @endphp

    <div class="bg-gradient-to-br from-primary-light/30 via-bg to-surface pt-32 pb-16">
        <div class="container mx-auto px-4">
            <a href="{{ route('catalog') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:text-primary-dark">
                <span aria-hidden="true">←</span> Kembali ke katalog
            </a>

            <div class="mt-8 grid items-start gap-10 lg:grid-cols-2 lg:gap-16">
                <div class="flex min-h-[22rem] items-center justify-center overflow-hidden rounded-3xl bg-gradient-to-br from-primary/5 to-accent/10 p-8 shadow-sm sm:min-h-[32rem]">
                    @if ($product->image_path)
                        <img src="{{ Storage::disk('public')->url($product->image_path) }}" alt="{{ $product->name }}" class="h-full max-h-[30rem] w-full object-contain">
                    @else
                        <svg class="h-64 w-48 text-primary/20 sm:h-80 sm:w-60" viewBox="0 0 200 300" fill="currentColor" aria-label="Placeholder botol parfum" role="img" xmlns="http://www.w3.org/2000/svg">
                            <rect x="75" y="20" width="50" height="30" rx="5" opacity="0.8" />
                            <rect x="70" y="45" width="60" height="15" rx="3" opacity="0.9" />
                            <path d="M 85 60 L 85 90 L 115 90 L 115 60 Z" opacity="0.7" />
                            <path d="M 60 90 L 60 240 Q 60 260 80 260 L 120 260 Q 140 260 140 240 L 140 90 Z" opacity="0.6" />
                        </svg>
                    @endif
                </div>

                <article class="flex flex-col gap-6">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">{{ $product->brand }}</span>
                        @if ($product->is_best_seller)
                            <span class="rounded-full bg-accent/15 px-3 py-1 text-xs font-bold text-accent">Best Seller</span>
                        @endif
                    </div>

                    <div>
                        <h1 class="text-4xl font-bold leading-tight text-primary-dark md:text-5xl">{{ $product->name }}</h1>
                        <p class="mt-3 text-lg text-text-muted">{{ $product->size }}</p>
                    </div>

                    <p class="text-3xl font-bold text-primary">Rp{{ number_format((float) $product->price, 0, ',', '.') }}</p>

                    <div class="flex items-center gap-3">
                        <span class="rounded-full px-4 py-2 text-sm font-semibold {{ $statusClasses }}">{{ $product->status_label }}</span>
                        @if ($product->status === 'out_of_stock')
                            <span class="text-sm text-text-muted">Hubungi kami untuk informasi stok terbaru.</span>
                        @endif
                    </div>

                    @if ($product->description)
                        <div class="border-t border-border-custom pt-6">
                            <h2 class="text-lg font-semibold text-primary-dark">Tentang produk</h2>
                            <p class="mt-3 whitespace-pre-line leading-7 text-text-muted">{{ $product->description }}</p>
                        </div>
                    @endif

                    <div class="flex flex-col gap-3 border-t border-border-custom pt-6 sm:flex-row">
                        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl bg-primary px-6 py-3 font-semibold text-white transition hover:bg-primary-dark">
                            Tanya via WhatsApp
                        </a>
                        <a href="{{ route('about') }}#kontak" class="inline-flex items-center justify-center rounded-xl border border-primary px-6 py-3 font-semibold text-primary transition hover:bg-primary-light/30">
                            Informasi Toko
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </div>
@endsection
