<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'udx' => $user = User::all()->random()->udx,
            'store_email' => fake()->email(),
            'store_name' => fake()->name(),
            'store_tel' => fake()->phoneNumber(),
            'state' => 10,
            'slug' => fake()->slug(),
        ];
    }
}
