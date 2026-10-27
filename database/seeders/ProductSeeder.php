<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * Distribusi produk dummy untuk kebutuhan pengembangan:
     * - 4 produk Best Seller (status: available, is_best_seller: true)
     * - 16 produk tersedia biasa (status: available)
     * - 4 produk habis (status: out_of_stock)
     * - 2 produk tidak dijual lagi (status: discontinued)
     *
     * Total: 26 produk dummy
     */
    public function run(): void
    {
        // Pastikan tidak ada duplikat jika seeder dijalankan ulang
        if (Product::count() > 0) {
            $this->command->info('Products already seeded, skipping.');
            return;
        }

        // Best seller products
        Product::factory(4)->bestSeller()->create();

        // Regular available products
        Product::factory(16)->available()->create();

        // Out of stock products
        Product::factory(4)->state(['status' => 'out_of_stock', 'is_best_seller' => false])->create();

        // Discontinued products (tidak tampil di katalog publik)
        Product::factory(2)->discontinued()->create();

        $this->command->info('26 dummy products seeded successfully.');
    }
}
