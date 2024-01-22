<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ToppingsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(FormatsSeeder::class);
        $this->call(ProductsSeeder::class);
    }
}
