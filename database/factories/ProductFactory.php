<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = [
            'Dior',
            'Chanel',
            'Versace',
            'Gucci',
            'YSL',
            'Tom Ford',
            'Paco Rabanne',
            'Calvin Klein',
            'Hugo Boss',
            'Armani',
            'Burberry',
            'Dolce & Gabbana',
            'Givenchy',
            'Hermès',
        ];

        $perfumeNames = [
            'Midnight Rose',
            'Ocean Breeze',
            'Golden Oud',
            'Black Orchid',
            'Velvet Dream',
            'Crystal Noir',
            'Blue Seduction',
            'Sweet Escape',
            'Wild Amber',
            'Jasmine Bloom',
            'Cedar Wood',
            'Citrus Burst',
            'Floral Mist',
            'Musky Nights',
            'Dark Cherry',
            'Vanilla Sky',
            'Icy Fresh',
            'Spicy Sensation',
            'Rose Elixir',
            'Green Nature',
            'Saffron Oud',
            'White Musk',
            'Iris Royale',
            'Lavender Fields',
            'Sea Salt',
            'Smoky Leather',
            'Peony Petals',
            'Bergamot Zest',
            'Sandalwood Dusk',
            'Exotic Spice',
        ];

        return [
            'name' => $this->faker->randomElement($perfumeNames) . ' ' . $this->faker->randomElement(['EDP', 'EDT', 'Parfum', 'Cologne']),
            'brand' => $this->faker->randomElement($brands),
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->randomElement([
                150000,
                200000,
                250000,
                300000,
                350000,
                400000,
                450000,
                500000,
                600000,
                750000,
                850000,
                1000000,
                1250000,
                1500000,
                2000000,
            ]),
            'size' => $this->faker->randomElement(['30ml', '50ml', '75ml', '100ml', '125ml', '150ml', '200ml']),
            'image_path' => null,
            'status' => $this->faker->randomElement([
                'available',
                'available',
                'available', // weighted: lebih banyak available
                'out_of_stock',
                'discontinued',
            ]),
            'is_best_seller' => $this->faker->boolean(20), // 20% chance
        ];
    }

    /**
     * Indicate the product is available.
     */
    public function available(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'available',
        ]);
    }

    /**
     * Indicate the product is a best seller.
     */
    public function bestSeller(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'available',
            'is_best_seller' => true,
        ]);
    }

    /**
     * Indicate the product is discontinued.
     */
    public function discontinued(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'discontinued',
            'is_best_seller' => false,
        ]);
    }
}
