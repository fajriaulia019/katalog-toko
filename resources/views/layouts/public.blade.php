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
        <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-5 bg-transparent">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <a href="/" id="navbar-brand" class="text-2xl font-bold text-white transition-colors duration-300">
                        {{ config('app.name', 'Katalog Parfum') }}
                    </a>
                    <div class="hidden md:flex space-x-6">
                        <a href="/" id="nav-link-home" class="nav-link text-white/90 hover:text-white transition-colors duration-200">Home</a>
                        <a href="#" class="nav-link text-white/90 hover:text-white transition-colors duration-200">Katalog</a>
                        <a href="#" class="nav-link text-white/90 hover:text-white transition-colors duration-200">Tentang Kami</a>
                    </div>
                    {{-- Mobile menu button --}}
                    <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
                {{-- Mobile menu --}}
                <div id="mobile-menu" class="hidden md:hidden mt-4 pb-2 space-y-2">
                    <a href="/" class="block nav-link text-white/90 hover:text-white py-1 transition-colors duration-200">Home</a>
                    <a href="#" class="block nav-link text-white/90 hover:text-white py-1 transition-colors duration-200">Katalog</a>
                    <a href="#" class="block nav-link text-white/90 hover:text-white py-1 transition-colors duration-200">Tentang Kami</a>
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
                <div class="text-center">
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
            const scrolled = window.scrollY > 50;

            if (scrolled) {
                navbar.classList.remove('bg-transparent', 'py-5');
                navbar.classList.add('bg-surface/95', 'backdrop-blur-md', 'shadow-md', 'border-b', 'border-border-custom', 'py-3');
                brand.classList.remove('text-white');
                brand.classList.add('text-primary');
                navLinks.forEach(link => {
                    link.classList.remove('text-white/90', 'hover:text-white');
                    link.classList.add('text-text-main', 'hover:text-primary');
                });
            } else {
                navbar.classList.add('bg-transparent', 'py-5');
                navbar.classList.remove('bg-surface/95', 'backdrop-blur-md', 'shadow-md', 'border-b', 'border-border-custom', 'py-3');
                brand.classList.add('text-white');
                brand.classList.remove('text-primary');
                navLinks.forEach(link => {
                    link.classList.add('text-white/90', 'hover:text-white');
                    link.classList.remove('text-text-main', 'hover:text-primary');
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
