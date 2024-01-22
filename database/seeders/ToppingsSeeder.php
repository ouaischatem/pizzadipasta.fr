<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingsSeeder extends Seeder
{
    /**
     * Exécutez la commande de base de données.
     *
     * @return void
     */
    public function run()
    {
        $toppingsData = [
            ['name' => 'Mozzarella', 'price' => 2.00],
            ['name' => 'Chorizo', 'price' => 2.00],
            ['name' => 'Olives', 'price' => 2.00],
            ['name' => 'Oignions', 'price' => 2.00],
            ['name' => 'Tomate', 'price' => 2.00],
            ['name' => 'Champignons', 'price' => 2.00],
            ['name' => 'Poulet', 'price' => 2.00]
        ];

        DB::table('toppings')->insert($toppingsData);
    }
}
