<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RuntimeException;
use Throwable;

class ProductController extends Controller
{
    private const IMAGE_DISK = 'public';

    public function index(): View
    {
        $products = Product::query()
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $imagePath = $this->storeImage($request->file('image'));
        $data['image_path'] = $imagePath;
        $data['is_best_seller'] = $request->boolean('is_best_seller');
        unset($data['image']);

        try {
            Product::create($data);
        } catch (Throwable $exception) {
            $this->deleteImage($imagePath);
            throw $exception;
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();
        $oldImagePath = $product->image_path;
        $newImagePath = $request->hasFile('image')
            ? $this->storeImage($request->file('image'))
            : $oldImagePath;

        $data['image_path'] = $newImagePath;
        $data['is_best_seller'] = $request->boolean('is_best_seller');
        unset($data['image']);

        try {
            $product->update($data);
        } catch (Throwable $exception) {
            if ($newImagePath !== $oldImagePath) {
                $this->deleteImage($newImagePath);
            }

            throw $exception;
        }

        if ($newImagePath !== $oldImagePath) {
            $this->deleteImage($oldImagePath);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $imagePath = $product->image_path;
        $product->delete();
        $this->deleteImage($imagePath);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    private function storeImage(?UploadedFile $image): ?string
    {
        if ($image === null) {
            return null;
        }

        $path = $image->store('products', self::IMAGE_DISK);

        if ($path === false) {
            throw new RuntimeException('Gambar produk gagal disimpan.');
        }

        return $path;
    }

    private function deleteImage(?string $path): void
    {
        if ($path !== null && $path !== '') {
            Storage::disk(self::IMAGE_DISK)->delete($path);
        }
    }
}
