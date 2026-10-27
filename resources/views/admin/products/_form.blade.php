@php($currentProduct = $product ?? null)

@if ($errors->any())
    <div class="mb-6 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
        <p class="font-semibold">Periksa kembali data produk:</p>
        <ul class="mt-2 list-inside list-disc">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-5 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label for="name" class="block text-sm font-medium text-text-main">Nama produk</label>
        <input id="name" name="name" type="text" value="{{ old('name', $currentProduct?->name) }}" required class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-primary focus:ring-primary">
        @error('name')<p class="mt-1 text-sm text-status-danger">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="brand" class="block text-sm font-medium text-text-main">Brand</label>
        <input id="brand" name="brand" type="text" value="{{ old('brand', $currentProduct?->brand) }}" required class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-primary focus:ring-primary">
        @error('brand')<p class="mt-1 text-sm text-status-danger">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="size" class="block text-sm font-medium text-text-main">Ukuran</label>
        <input id="size" name="size" type="text" value="{{ old('size', $currentProduct?->size) }}" placeholder="50ml" required class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-primary focus:ring-primary">
        @error('size')<p class="mt-1 text-sm text-status-danger">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="price" class="block text-sm font-medium text-text-main">Harga</label>
        <input id="price" name="price" type="number" min="0" step="0.01" value="{{ old('price', $currentProduct?->price) }}" required class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-primary focus:ring-primary">
        @error('price')<p class="mt-1 text-sm text-status-danger">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="status" class="block text-sm font-medium text-text-main">Status</label>
        <select id="status" name="status" required class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-primary focus:ring-primary">
            @foreach (['available' => 'Tersedia', 'out_of_stock' => 'Habis', 'discontinued' => 'Tidak Dijual'] as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $currentProduct?->status ?? 'available') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('status')<p class="mt-1 text-sm text-status-danger">{{ $message }}</p>@enderror
    </div>

    <div class="sm:col-span-2">
        <label for="description" class="block text-sm font-medium text-text-main">Deskripsi</label>
        <textarea id="description" name="description" rows="5" class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-primary focus:ring-primary">{{ old('description', $currentProduct?->description) }}</textarea>
        @error('description')<p class="mt-1 text-sm text-status-danger">{{ $message }}</p>@enderror
    </div>

    <div class="sm:col-span-2">
        <label for="image" class="block text-sm font-medium text-text-main">Gambar produk</label>
        <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp" class="mt-2 block w-full rounded-lg border border-gray-300 px-4 py-3 text-sm file:mr-4 file:rounded-md file:border-0 file:bg-primary-light file:px-4 file:py-2 file:font-semibold file:text-primary">
        <p class="mt-1 text-xs text-text-muted">JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</p>
        @error('image')<p class="mt-1 text-sm text-status-danger">{{ $message }}</p>@enderror
        <div class="mt-4 flex items-center gap-4">
            <img id="image-preview" src="{{ $currentProduct?->image_path ? Storage::disk('public')->url($currentProduct->image_path) : '' }}" alt="Preview gambar produk" class="{{ $currentProduct?->image_path ? '' : 'hidden' }} h-28 w-28 rounded-xl object-cover">
            <span id="image-preview-label" class="text-sm text-text-muted">{{ $currentProduct?->image_path ? 'Gambar saat ini' : 'Preview gambar akan muncul di sini' }}</span>
        </div>
    </div>

    <label class="sm:col-span-2 flex items-center gap-3 text-sm font-medium text-text-main">
        <input type="checkbox" name="is_best_seller" value="1" @checked(old('is_best_seller', $currentProduct?->is_best_seller ?? false)) class="rounded border-gray-300 text-primary focus:ring-primary">
        Tandai sebagai Best Seller
    </label>
</div>

<div class="mt-8 flex justify-end gap-3 border-t border-border-custom pt-6">
    <a href="{{ route('admin.products.index') }}" class="rounded-lg border border-gray-300 px-5 py-3 font-semibold text-text-main hover:bg-gray-50">Batal</a>
    <button type="submit" class="rounded-lg bg-primary px-5 py-3 font-semibold text-white hover:bg-primary-dark">Simpan Produk</button>
</div>

@pushOnce('scripts')
    <script>
        document.getElementById('image')?.addEventListener('change', function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            const label = document.getElementById('image-preview-label');

            if (!file) {
                return;
            }

            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
            label.textContent = file.name;
        });
    </script>
@endPushOnce
