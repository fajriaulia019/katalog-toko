@extends('layouts.admin')

@section('content')
    <div class="rounded-2xl bg-white p-8 shadow-sm">
        <p class="text-sm font-semibold uppercase tracking-wide text-primary">Dashboard Admin</p>
        <h1 class="mt-2 text-3xl font-bold text-primary-dark">Selamat datang, {{ auth()->user()->name }}.</h1>
        <p class="mt-3 text-text-muted">Kelola katalog produk Anda dari halaman admin.</p>
        <a href="{{ route('admin.products.index') }}" class="mt-6 inline-flex rounded-lg bg-primary px-5 py-3 font-semibold text-white hover:bg-primary-dark">
            Kelola Produk
        </a>
    </div>
@endsection
