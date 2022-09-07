<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group_id' => 'A',
            'category_name' => '대분류',
            'category_detail_name' => '패션뷰티',
            'category_id' => 1,
            'category_parent_id' => 0,
            'state' => 10,
            'slug' => fake()->slug(),
        ];
    }
}
