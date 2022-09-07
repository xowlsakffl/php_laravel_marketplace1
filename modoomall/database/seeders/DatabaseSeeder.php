<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(10)->create()->each(function($user){
            UserPayment::factory()->for($user)->create();
            UserAddress::factory()->for($user)->create();

            Store::factory()->for($user)->create();
        });

        ProductCategory::factory()->count(10)->create();

        Product::factory()->count(50)->create();
    }
}
