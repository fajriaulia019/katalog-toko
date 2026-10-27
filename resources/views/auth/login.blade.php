@extends('layouts.app')

@section('content')
    <main class="min-h-screen bg-bg flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md bg-surface rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-primary-dark">Login Admin</h1>
                <p class="text-text-muted mt-2">Masuk untuk mengelola katalog produk.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-text-main">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                        class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-primary focus:ring-primary">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-text-main">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-primary focus:ring-primary">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <label class="flex items-center gap-2 text-sm text-text-muted">
                    <input type="checkbox" name="remember" value="1" class="rounded border-gray-300 text-primary focus:ring-primary">
                    Ingat saya
                </label>

                <button type="submit" class="w-full rounded-lg bg-primary px-4 py-3 font-semibold text-white transition hover:bg-primary-dark">
                    Masuk
                </button>
            </form>
        </div>
    </main>
@endsection
