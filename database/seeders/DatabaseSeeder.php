<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        \App\Domain\Client\Models\Client::factory(10)->create();
        \App\Domain\Product\Models\Product::factory(10)->create();
        \App\Domain\Order\Models\Order::factory(10)->create();
    }
}
