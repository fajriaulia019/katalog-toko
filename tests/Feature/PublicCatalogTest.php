<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicCatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_shows_published_products_and_hides_discontinued_products(): void
    {
        $availableProduct = Product::factory()->available()->create(['name' => 'Available Rose']);
        $outOfStockProduct = Product::factory()->create([
            'name' => 'Sold Out Oud',
            'status' => 'out_of_stock',
        ]);
        Product::factory()->discontinued()->create(['name' => 'Discontinued Musk']);

        $response = $this->get(route('catalog'));

        $response->assertOk()
            ->assertSee($availableProduct->name)
            ->assertSee($outOfStockProduct->name)
            ->assertDontSee('Discontinued Musk');
    }

    public function test_homepage_applies_recent_and_best_seller_rules(): void
    {
        $this->travelTo('2026-10-28 12:00:00');
        $recentProduct = Product::factory()->available()->create(['name' => 'Recent Rose']);
        $recentOutOfStockProduct = Product::factory()->create([
            'name' => 'Recent Sold Out Oud',
            'status' => 'out_of_stock',
            'created_at' => now(),
        ]);
        $bestSellerProduct = Product::factory()->bestSeller()->create(['name' => 'Best Seller Amber']);
        Product::factory()->available()->create([
            'name' => 'Old Rose',
            'created_at' => now()->subDays(15),
        ]);
        Product::factory()->discontinued()->create(['name' => 'Discontinued Rose']);

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSee($recentProduct->name)
            ->assertSee($recentOutOfStockProduct->name)
            ->assertSee($bestSellerProduct->name)
            ->assertDontSee('Old Rose')
            ->assertDontSee('Discontinued Rose');
    }

    public function test_active_product_has_a_detail_page(): void
    {
        $product = Product::factory()->available()->create([
            'name' => 'Detail Rose',
            'description' => 'A detailed fragrance description.',
        ]);

        $response = $this->get(route('product.show', $product));

        $response->assertOk()
            ->assertSee($product->name)
            ->assertSee($product->brand)
            ->assertSee($product->description);
    }

    public function test_discontinued_product_detail_returns_not_found(): void
    {
        $product = Product::factory()->discontinued()->create();

        $this->get(route('product.show', $product))->assertNotFound();
    }
}
