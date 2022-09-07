<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'pcdx' => ProductCategory::all()->random()->pcdx,
            'sdx' => Store::all()->random()->sdx,
            'title' => fake()->title(),
            'name' => fake()->name(),
            'price' => 10000,
            'quantity' => 10,
            'content' => fake()->sentence(),
            'slug' => fake()->slug(),
        ];
    }
}
