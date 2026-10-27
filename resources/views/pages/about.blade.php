@extends('layouts.public')

@section('content')

{{-- Hero Section --}}
<div class="relative bg-gradient-to-br from-primary-light/40 via-bg to-surface overflow-hidden pt-28 pb-16">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 right-10 w-64 h-64 bg-accent rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-80 h-80 bg-primary rounded-full blur-3xl"></div>
    </div>
    <div class="container mx-auto px-4 relative">
        <div class="max-w-2xl">
            <span class="inline-block px-4 py-1.5 bg-primary/10 text-primary text-sm font-semibold rounded-full mb-4 tracking-wide">
                Tentang Kami
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-primary-dark leading-tight mb-4">
                Kenali Kami Lebih Dekat
            </h1>
            <p class="text-lg text-text-muted leading-relaxed">
                Kami hadir untuk menghadirkan koleksi parfum eksklusif pilihan dengan kualitas terbaik langsung ke tangan Anda.
            </p>
        </div>
    </div>
</div>

{{-- Story Section --}}
<div class="bg-bg py-14">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Illustration --}}
            <div class="order-2 lg:order-1">
                <div class="relative bg-white/60 backdrop-blur-sm rounded-3xl p-8 shadow-xl border border-white/60 aspect-square flex items-center justify-center overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-accent/10 rounded-full blur-2xl"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-primary/10 rounded-full blur-2xl"></div>
                    {{-- Perfume bottle SVG --}}
                    <svg class="w-2/3 h-2/3 text-primary/25 relative z-10" viewBox="0 0 200 300" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <rect x="75" y="20" width="50" height="30" rx="5" fill="currentColor" opacity="0.8"/>
                        <rect x="70" y="45" width="60" height="15" rx="3" fill="currentColor" opacity="0.9"/>
                        <path d="M 85 60 L 85 90 L 115 90 L 115 60 Z" fill="currentColor" opacity="0.7"/>
                        <path d="M 60 90 L 60 240 Q 60 260 80 260 L 120 260 Q 140 260 140 240 L 140 90 Z" fill="currentColor" opacity="0.6"/>
                        <path d="M 70 170 L 70 240 Q 70 255 85 255 L 115 255 Q 130 255 130 240 L 130 170 Z" fill="#D5AE68" opacity="0.35"/>
                        <ellipse cx="90" cy="115" rx="8" ry="25" fill="white" opacity="0.3"/>
                    </svg>
                    <div class="absolute top-4 right-4 bg-accent text-white text-xs font-bold px-3 py-1.5 rounded-full shadow">
                        Est. 2020
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="order-1 lg:order-2 space-y-5">
                <h2 class="text-3xl font-bold text-primary-dark">Cerita di Balik Toko Kami</h2>
                <p class="text-text-muted leading-relaxed">
                    Berawal dari kecintaan terhadap dunia parfum, kami mendirikan toko ini dengan satu misi: menghadirkan aroma eksklusif berkualitas tinggi yang terjangkau untuk semua kalangan.
                </p>
                <p class="text-text-muted leading-relaxed">
                    Dengan pengalaman bertahun-tahun di industri parfum, kami memilih setiap produk dengan teliti untuk memastikan Anda mendapatkan yang terbaik. Kepuasan Anda adalah prioritas utama kami.
                </p>
                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-4 pt-4">
                    <div class="bg-surface rounded-2xl p-4 text-center shadow-sm border border-border-custom">
                        <div class="text-2xl font-bold text-primary">200+</div>
                        <div class="text-xs text-text-muted mt-1">Produk</div>
                    </div>
                    <div class="bg-surface rounded-2xl p-4 text-center shadow-sm border border-border-custom">
                        <div class="text-2xl font-bold text-accent">5K+</div>
                        <div class="text-xs text-text-muted mt-1">Pelanggan</div>
                    </div>
                    <div class="bg-surface rounded-2xl p-4 text-center shadow-sm border border-border-custom">
                        <div class="text-2xl font-bold text-primary">4+</div>
                        <div class="text-xs text-text-muted mt-1">Tahun</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Values Section --}}
<div class="bg-surface py-14">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-xl mx-auto mb-10">
            <h2 class="text-3xl font-bold text-primary-dark mb-3">Nilai-Nilai Kami</h2>
            <p class="text-text-muted">Landasan yang kami pegang dalam melayani setiap pelanggan.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-bg rounded-2xl p-6 border border-border-custom hover:shadow-lg transition-shadow duration-300">
                <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-primary-dark mb-2">Kualitas Terjamin</h3>
                <p class="text-sm text-text-muted leading-relaxed">Setiap produk melalui seleksi ketat untuk memastikan keaslian dan kualitasnya.</p>
            </div>

            <div class="bg-bg rounded-2xl p-6 border border-border-custom hover:shadow-lg transition-shadow duration-300">
                <div class="w-12 h-12 bg-accent/15 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-primary-dark mb-2">Pelayanan Tulus</h3>
                <p class="text-sm text-text-muted leading-relaxed">Kami melayani dengan hati, selalu siap membantu Anda menemukan parfum yang tepat.</p>
            </div>

            <div class="bg-bg rounded-2xl p-6 border border-border-custom hover:shadow-lg transition-shadow duration-300 sm:col-span-2 lg:col-span-1">
                <div class="w-12 h-12 bg-status-success/10 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-status-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-primary-dark mb-2">Harga Terbaik</h3>
                <p class="text-sm text-text-muted leading-relaxed">Parfum premium dengan harga yang kompetitif dan transparan tanpa biaya tersembunyi.</p>
            </div>
        </div>
    </div>
</div>

{{-- Contact & Map Section --}}
<div class="bg-bg py-14" id="kontak">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-xl mx-auto mb-10">
            <h2 class="text-3xl font-bold text-primary-dark mb-3">Hubungi & Kunjungi Kami</h2>
            <p class="text-text-muted">Kami siap melayani Anda. Datang langsung atau hubungi kami via WhatsApp.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- Contact Info Cards --}}
            <div class="space-y-4">

                {{-- Address Card --}}
                <div class="bg-surface rounded-2xl p-6 border border-border-custom shadow-sm flex gap-4 items-start">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-primary-dark mb-1">Alamat Toko</h3>
                        <p class="text-text-muted text-sm leading-relaxed">
                            Jl. Contoh No. 123, Kelurahan Contoh,<br>
                            Kecamatan Contoh, Kota Contoh,<br>
                            Provinsi Contoh 12345
                        </p>
                        <a href="https://maps.google.com" target="_blank"
                           class="inline-flex items-center gap-1.5 mt-3 text-sm text-primary font-medium hover:text-primary-dark transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Buka di Google Maps
                        </a>
                    </div>
                </div>

                {{-- WhatsApp Card --}}
                <div class="bg-surface rounded-2xl p-6 border border-border-custom shadow-sm flex gap-4 items-start">
                    <div class="w-12 h-12 bg-[#25D366]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-primary-dark mb-1">WhatsApp</h3>
                        <p class="text-text-muted text-sm mb-3">+62 812-3456-7890</p>
                        <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20parfum%20Anda."
                           target="_blank"
                           class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#25D366] text-white text-sm font-semibold rounded-xl hover:bg-[#1ebe5d] transition-colors shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Chat Sekarang
                        </a>
                    </div>
                </div>

                {{-- Jam Operasional Card --}}
                <div class="bg-surface rounded-2xl p-6 border border-border-custom shadow-sm flex gap-4 items-start">
                    <div class="w-12 h-12 bg-accent/15 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-primary-dark mb-3">Jam Operasional</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-text-muted">Senin – Jumat</span>
                                <span class="font-medium text-text-main">08.00 – 21.00</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-text-muted">Sabtu – Minggu</span>
                                <span class="font-medium text-text-main">09.00 – 22.00</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-text-muted">Hari Libur</span>
                                <span class="font-medium text-status-warning">Tutup</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Map --}}
            <div class="rounded-2xl overflow-hidden border border-border-custom shadow-sm h-full min-h-80">
                {{-- Placeholder Map — ganti src iframe dengan embed Google Maps Anda --}}
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15865.123456789!2d106.8456!3d-6.2088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMzEuNyJTIDEwNsKwNTAnNDQuMiJF!5e0!3m2!1sid!2sid!4v1234567890"
                    width="100%"
                    height="100%"
                    class="w-full h-full min-h-80"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi Toko">
                </iframe>
            </div>
        </div>
    </div>
</div>

{{-- CTA Section --}}
<div class="bg-gradient-to-br from-primary to-primary-dark text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-3">Siap Temukan Parfum Impian Anda?</h2>
        <p class="text-white/80 text-lg mb-8">Jelajahi ratusan koleksi parfum eksklusif kami sekarang.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('catalog') }}"
               class="px-8 py-4 bg-white text-primary font-semibold rounded-xl hover:bg-accent hover:text-white transition-all duration-300 shadow-lg">
                Lihat Katalog
            </a>
            <a href="https://wa.me/6281234567890" target="_blank"
               class="px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-xl border-2 border-white/30 hover:bg-white/20 transition-all duration-300">
                Hubungi via WA
            </a>
        </div>
    </div>
</div>

@endsection
