<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $name = fake()->word(2, true);

        return [
            'sku'   => fake()->isbn10(),
            'name'  => $name,
            'slug'  => Str::slug($name),
            'price' => fake()->randomFloat,
            'status'=> Product::ACTIVE,
            'publish_date'  => now(),
            'excerpt'   => fake()->text(),
            'body'      => fake()->text(),            
        ];
    }
}
