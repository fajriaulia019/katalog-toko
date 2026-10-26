@extends('layouts.public')

@section('content')
<div class="py-12 bg-gradient-to-b from-primary-light/20 to-transparent">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-primary-dark mb-4">
            Katalog Parfum Eksklusif
        </h1>
        <p class="text-lg text-text-muted max-w-2xl mx-auto mb-8">
            Temukan aroma terbaik untuk menyempurnakan hari Anda. Jelajahi koleksi lengkap kami.
        </p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="#" class="px-6 py-3 bg-primary text-white font-semibold rounded-lg shadow hover:bg-primary-dark transition-colors duration-200">
                Lihat Produk Kami
            </a>
            <a href="#" class="px-6 py-3 bg-surface text-primary font-semibold rounded-lg border border-primary hover:bg-primary-light/30 transition-colors duration-200">
                Tentang Kami
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