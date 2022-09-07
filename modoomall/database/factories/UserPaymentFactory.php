<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPayment>
 */
class UserPaymentFactory extends Factory
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
            'payment_type' => fake()->randomElement(['카드', '계좌']),
            'provider' => fake()->randomElement(['삼성카드', '카카오뱅크']),
            'account_no' => fake()->creditCardNumber(),
            'expiry' => fake()->date(),
            'slug' => fake()->slug(),
        ];
    }
}
