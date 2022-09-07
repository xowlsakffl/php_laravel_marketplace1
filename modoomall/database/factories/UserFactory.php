<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [         
            'email' => fake()->safeEmail(),
            'password' => fake()->password(),
            'name' => fake()->name(),
            'email_auth' => "N",         
            'cell' => fake()->phoneNumber(),   
            'cell_auth' => "N",   
            'tel' => fake()->phoneNumber(),  
            'join_from' => "home",  
            'super' => "N", 
            'state' => 10,       
            'slug' => fake()->slug(), 
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
