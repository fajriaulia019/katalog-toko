@extends('layouts.public')

@section('content')
{{-- Hero Section --}}
<div class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light overflow-hidden">
    {{-- Background Decorative Elements --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 right-20 w-72 h-72 bg-accent rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-primary rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto px-4 pt-32 pb-16 md:pt-40 md:pb-24 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Left Content --}}
            <div class="space-y-6">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
                    Katalog Parfum Eksklusif
                </h1>
                <p class="text-lg md:text-xl text-white/80 leading-relaxed">
                    Temukan aroma terbaik untuk menyempurnakan hari Anda. Jelajahi koleksi lengkap kami.
                </p>
                <div class="flex gap-4 flex-wrap pt-4">
                    <a href="#katalog" class="px-8 py-4 bg-accent text-white font-semibold rounded-lg shadow-lg hover:bg-accent/90 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        Lihat Produk Kami
                    </a>
                    <a href="#tentang" class="px-8 py-4 bg-white/10 text-white font-semibold rounded-lg border-2 border-white/40 hover:bg-white/20 transition-all duration-300 backdrop-blur-sm">
                        Tentang Kami
                    </a>
                </div>
            </div>
            
            {{-- Right Image --}}
            <div class="relative">
                {{-- Glassmorphism Card Effect --}}
                <div class="relative bg-white/40 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/60">
                    {{-- Dummy Perfume Image Placeholder --}}
                    <div class="aspect-square bg-gradient-to-br from-primary/10 to-accent/20 rounded-2xl flex items-center justify-center relative overflow-hidden">
                        {{-- SVG Perfume Bottle Illustration --}}
                        <svg class="w-2/3 h-2/3 text-primary/30" viewBox="0 0 200 300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
                        
                        {{-- Decorative Circles --}}
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-accent/20 rounded-full blur-xl"></div>
                        <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-primary/20 rounded-full blur-xl"></div>
                    </div>
                    
                    {{-- Badge --}}
                    <div class="absolute -top-4 -right-4 bg-accent text-white px-4 py-2 rounded-full shadow-lg font-semibold text-sm">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-primary-dark">Pelayanan Cepat</h3>
                <p class="text-text-muted">Konsultasi dan informasi produk yang responsif</p>
            </div>
            
            <div class="space-y-3">
                <div class="w-16 h-16 bg-status-success/10 rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8 text-status-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-primary-dark">Lokasi Strategis</h3>
                <p class="text-text-muted">Kunjungi toko kami untuk pengalaman langsung</p>
            </div>
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