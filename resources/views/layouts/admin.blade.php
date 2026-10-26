<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'Katalog Parfum') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased bg-gray-100 text-[--color-text-main]">
    <div class="min-h-screen flex flex-col">
        {{-- Admin Navigation --}}
        <nav class="bg-[--color-primary-dark] text-white">
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <a href="/admin" class="text-xl font-bold">
                        Admin Panel - {{ config('app.name') }}
                    </a>
                    <div class="flex space-x-4">
                        <a href="/admin/products" class="hover:text-[--color-accent] transition-colors duration-200">Products</a>
                        <form method="POST" action="/logout" class="inline">
                            @csrf
                            <button type="submit" class="hover:text-[--color-accent] transition-colors duration-200">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Main Content --}}
        <main class="flex-1 py-8">
            <div class="container mx-auto px-4">
                @yield('content')
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>
