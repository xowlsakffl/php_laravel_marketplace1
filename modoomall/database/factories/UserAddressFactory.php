<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
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
            'title' => '배송지',
            'zipcode' => fake()->postcode(),
            'address1' => fake()->address(),
            'address2' => fake()->streetAddress(),
            'name' => fake()->name(),
            'tel' => fake()->phoneNumber(),
            'msg' => fake()->realText(),
            'slug' => fake()->slug(),
        ];
    }
}
