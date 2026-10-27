<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_product_management(): void
    {
        $this->get(route('admin.products.index'))
            ->assertRedirect(route('login'));
    }

    public function test_admin_can_create_product_with_an_image(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $image = UploadedFile::fake()->image('rose.jpg');

        $response = $this->actingAs($user)->post(route('admin.products.store'), [
            ...$this->validProductData(),
            'is_best_seller' => '1',
            'image' => $image,
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $product = Product::query()->firstOrFail();
        $this->assertSame('available', $product->status);
        $this->assertTrue($product->is_best_seller);
        $this->assertNotNull($product->image_path);
        Storage::disk('public')->assertExists($product->image_path);
    }

    public function test_product_creation_rejects_invalid_image_files(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->from(route('admin.products.create'))->post(route('admin.products.store'), [
            ...$this->validProductData(),
            'image' => UploadedFile::fake()->create('document.exe', 100, 'application/octet-stream'),
        ]);

        $response->assertRedirect(route('admin.products.create'))
            ->assertSessionHasErrors('image');
        $this->assertDatabaseCount('products', 0);
        Storage::disk('public')->assertDirectoryEmpty('products');
    }

    public function test_admin_can_update_product_and_replace_its_image(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        Storage::disk('public')->put('products/old.jpg', 'old image');
        $product = Product::factory()->create(['image_path' => 'products/old.jpg']);

        $response = $this->actingAs($user)->put(route('admin.products.update', $product), [
            ...$this->validProductData(),
            'name' => 'Updated Product',
            'status' => 'out_of_stock',
            'image' => UploadedFile::fake()->image('new.png'),
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $product->refresh();
        $this->assertSame('Updated Product', $product->name);
        $this->assertSame('out_of_stock', $product->status);
        Storage::disk('public')->assertMissing('products/old.jpg');
        Storage::disk('public')->assertExists($product->image_path);
    }

    public function test_admin_can_delete_product_and_its_image(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        Storage::disk('public')->put('products/delete-me.jpg', 'image');
        $product = Product::factory()->create(['image_path' => 'products/delete-me.jpg']);

        $response = $this->actingAs($user)->delete(route('admin.products.destroy', $product));

        $response->assertRedirect(route('admin.products.index'));
        $this->assertModelMissing($product);
        Storage::disk('public')->assertMissing('products/delete-me.jpg');
    }

    /**
     * @return array<string, string>
     */
    private function validProductData(): array
    {
        return [
            'name' => 'Rose Elixir',
            'brand' => 'Maison Test',
            'description' => 'A floral fragrance.',
            'price' => '350000',
            'size' => '50ml',
            'status' => 'available',
        ];
    }
}
