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
<body class="antialiased bg-[--color-bg] text-[--color-text-main]">
    <div class="min-h-screen flex flex-col">
        {{-- Navbar --}}
        <nav class="bg-[--color-surface] border-b border-[--color-border-custom]">
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <a href="/" class="text-2xl font-bold text-[--color-primary]">
                        {{ config('app.name', 'Katalog Parfum') }}
                    </a>
                    <div class="hidden md:flex space-x-6">
                        <a href="/" class="text-[--color-text-main] hover:text-[--color-primary] transition-colors duration-200">Home</a>
                        <a href="#" class="text-[--color-text-main] hover:text-[--color-primary] transition-colors duration-200">Katalog</a>
                        <a href="#" class="text-[--color-text-main] hover:text-[--color-primary] transition-colors duration-200">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Main Content --}}
        <main class="flex-1">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-[--color-primary-dark] text-white py-8">
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
