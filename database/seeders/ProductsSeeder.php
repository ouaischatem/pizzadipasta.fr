<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Exécutez la commande de base de données.
     *
     * @return void
     */
    public function run()
    {
        $productsData = [
            ['image' => 'pizza.png', "title" => "Pizza Fromage", "description" => "pizza 4 fromages", 'category' => 'pizza', 'price' => 10.00],
            ['image' => 'pizza.png', "title" => "Pizza Clakos", "description" => "pizza clakos", 'category' => 'pizza', 'price' => 12.00],
            ['image' => 'pizza.png', "title" => "Pizza BBQ", "description" => "pizza bbq", 'category' => 'pizza', 'price' => 8.00],
        ];

        DB::table('products')->insert($productsData);
    }
}
