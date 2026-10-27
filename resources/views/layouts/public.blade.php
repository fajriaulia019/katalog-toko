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
        <nav
            x-data="{ scrolled: false, mobileOpen: false }"
            x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
            :class="scrolled
                ? 'bg-surface/95 backdrop-blur-md shadow-md border-b border-border-custom'
                : 'bg-transparent border-b border-transparent'"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
        >
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    {{-- Logo --}}
                    <a href="/"
                        :class="scrolled ? 'text-primary' : 'text-white'"
                        class="text-2xl font-bold transition-colors duration-300">
                        {{ config('app.name', 'Katalog Parfum') }}
                    </a>

                    {{-- Desktop Menu --}}
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="/"
                            :class="scrolled ? 'text-text-main hover:text-primary' : 'text-white/90 hover:text-white'"
                            class="font-medium transition-colors duration-200">Home</a>
                        <a href="#katalog"
                            :class="scrolled ? 'text-text-main hover:text-primary' : 'text-white/90 hover:text-white'"
                            class="font-medium transition-colors duration-200">Katalog</a>
                        <a href="#tentang"
                            :class="scrolled ? 'text-text-main hover:text-primary' : 'text-white/90 hover:text-white'"
                            class="font-medium transition-colors duration-200">Tentang Kami</a>
                    </div>

                    {{-- Mobile Hamburger --}}
                    <button
                        @click="mobileOpen = !mobileOpen"
                        :class="scrolled ? 'text-primary-dark' : 'text-white'"
                        class="md:hidden transition-colors duration-200 focus:outline-none">
                        <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                {{-- Mobile Menu --}}
                <div
                    x-show="mobileOpen"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="md:hidden mt-3 pb-3 border-t border-white/20 space-y-1"
                >
                    <a href="/"
                        :class="scrolled ? 'text-text-main hover:text-primary hover:bg-primary/5' : 'text-white hover:bg-white/10'"
                        class="block px-3 py-2 rounded-lg font-medium transition-all duration-200">Home</a>
                    <a href="#katalog"
                        :class="scrolled ? 'text-text-main hover:text-primary hover:bg-primary/5' : 'text-white hover:bg-white/10'"
                        class="block px-3 py-2 rounded-lg font-medium transition-all duration-200">Katalog</a>
                    <a href="#tentang"
                        :class="scrolled ? 'text-text-main hover:text-primary hover:bg-primary/5' : 'text-white hover:bg-white/10'"
                        class="block px-3 py-2 rounded-lg font-medium transition-all duration-200">Tentang Kami</a>
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
</body>
</html>
