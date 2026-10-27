@extends('layouts.admin')

@section('content')
    <div class="flex flex-col gap-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-primary">Katalog</p>
                <h1 class="mt-1 text-3xl font-bold text-primary-dark">Daftar Produk</h1>
            </div>
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center justify-center rounded-lg bg-primary px-5 py-3 font-semibold text-white hover:bg-primary-dark">
                Tambah Produk
            </a>
        </div>

        @if (session('success'))
            <div class="rounded-lg bg-green-50 px-4 py-3 text-sm text-green-700" role="status">{{ session('success') }}</div>
        @endif

        <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-border-custom">
                    <thead class="bg-primary-light/40">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wide text-text-muted">
                            <th class="px-6 py-4">Produk</th>
                            <th class="px-6 py-4">Harga</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Best Seller</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border-custom">
                        @forelse ($products as $product)
                            <tr class="text-sm text-text-main">
                                <td class="px-6 py-4">
                                    <div class="flex min-w-56 items-center gap-3">
                                        @if ($product->image_path)
                                            <img src="{{ Storage::disk('public')->url($product->image_path) }}" alt="{{ $product->name }}" class="h-12 w-12 rounded-lg object-cover">
                                        @else
                                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary-light text-primary">—</div>
                                        @endif
                                        <div>
                                            <p class="font-semibold">{{ $product->name }}</p>
                                            <p class="text-xs text-text-muted">{{ $product->brand }} · {{ $product->size }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">Rp{{ number_format((float) $product->price, 0, ',', '.') }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $product->status === 'available' ? 'bg-green-100 text-green-700' : ($product->status === 'out_of_stock' ? 'bg-amber-100 text-amber-700' : 'bg-red-100 text-red-700') }}">
                                        {{ $product->status_label }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $product->is_best_seller ? 'Ya' : 'Tidak' }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-right">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="font-semibold text-primary hover:text-primary-dark">Edit</a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-semibold text-status-danger hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-text-muted">Belum ada produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($products->hasPages())
                <div class="border-t border-border-custom px-6 py-4">{{ $products->links() }}</div>
            @endif
        </div>
    </div>
@endsection
