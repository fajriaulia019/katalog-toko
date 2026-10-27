@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-primary hover:text-primary-dark">← Kembali ke produk</a>
            <h1 class="mt-3 text-3xl font-bold text-primary-dark">Tambah Produk</h1>
        </div>

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="rounded-2xl bg-white p-6 shadow-sm sm:p-8">
            @csrf
            @include('admin.products._form')
        </form>
    </div>
@endsection
