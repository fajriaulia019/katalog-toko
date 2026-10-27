<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Katalog Parfum') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased bg-bg text-text-main">
    <div class="min-h-screen flex flex-col">
        {{-- Navbar --}}
        <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-5 bg-white/60 backdrop-blur-md border-b border-white/20">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <a href="/" id="navbar-brand" class="text-2xl font-bold text-primary-dark transition-colors duration-300">
                        {{ config('app.name', 'Katalog Parfum') }}
                    </a>
                    <div class="hidden md:flex space-x-6">
                        <a href="/" id="nav-link-home" class="nav-link text-primary hover:text-primary-dark transition-colors duration-200 font-medium">Home</a>
                        <a href="{{ route('catalog') }}" class="nav-link text-primary hover:text-primary-dark transition-colors duration-200 font-medium">Katalog</a>
                        <a href="{{ route('about') }}" class="nav-link text-primary hover:text-primary-dark transition-colors duration-200 font-medium">Tentang Kami</a>
                    </div>
                    {{-- Mobile menu button --}}
                    <button id="mobile-menu-btn" class="md:hidden text-primary-dark focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
                {{-- Mobile menu --}}
                <div id="mobile-menu" class="hidden md:hidden mt-4 pb-2 space-y-2">
                    <a href="/" class="block nav-link text-primary hover:text-primary-dark py-2 transition-colors duration-200 font-medium">Home</a>
                    <a href="{{ route('catalog') }}" class="block nav-link text-primary hover:text-primary-dark py-2 transition-colors duration-200 font-medium">Katalog</a>
                    <a href="{{ route('about') }}" class="block nav-link text-primary hover:text-primary-dark py-2 transition-colors duration-200 font-medium">Tentang Kami</a>
                </div>
            </div>
        </nav>

        {{-- Main Content --}}
        <main class="flex-1">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-primary-dark text-white py-8">
            <div class="container mx-auto px-4">
                <div class="grid gap-8 md:grid-cols-3">
                    <div>
                        <p class="text-xl font-bold">{{ config('app.name') }}</p>
                        <p class="mt-3 text-sm leading-6 text-white/70">Katalog parfum pilihan untuk membantu Anda menemukan aroma yang tepat.</p>
                    </div>
                    <div>
                        <p class="font-semibold">Kunjungi Kami</p>
                        <p class="mt-3 text-sm leading-6 text-white/70">Jl. Contoh No. 123, Kota Contoh<br>Senin–Jumat, 08.00–21.00</p>
                    </div>
                    <div>
                        <p class="font-semibold">Kontak</p>
                        <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer" class="mt-3 inline-block text-sm text-white/70 hover:text-white">WhatsApp +62 812-3456-7890</a>
                    </div>
                </div>
                <div class="mt-8 border-t border-white/10 pt-6 text-center text-sm text-white/60">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    @livewireScripts

    <script>
        const navbar = document.getElementById('navbar');
        const brand = document.getElementById('navbar-brand');
        const navLinks = document.querySelectorAll('.nav-link');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        function updateNavbar() {
            const scrolled = window.scrollY > 100;

            if (scrolled) {
                // Scrolled: Solid white background with shadow
                navbar.classList.remove('bg-white/60', 'border-b', 'border-white/20');
                navbar.classList.add('bg-white/95', 'backdrop-blur-lg', 'shadow-lg', 'border-b', 'border-primary/5', 'py-3');
                brand.classList.add('text-primary-dark');
                navLinks.forEach(link => {
                    link.classList.add('text-text-main');
                });
            } else {
                // Top: Light glassmorphic background
                navbar.classList.add('bg-white/60', 'border-b', 'border-white/20');
                navbar.classList.remove('bg-white/95', 'backdrop-blur-lg', 'shadow-lg', 'border-b', 'border-primary/5', 'py-3');
                brand.classList.remove('text-primary-dark');
                navLinks.forEach(link => {
                    link.classList.remove('text-text-main');
                });
            }
        }

        window.addEventListener('scroll', updateNavbar);
        updateNavbar();

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
