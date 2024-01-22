<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatsSeeder extends Seeder
{
    /**
     * Exécutez la commande de base de données.
     *
     * @return void
     */
    public function run()
    {
        $formatsData = [
            ['size' => 'Small', 'price' => 0.00],
            ['size' => 'Medium', 'price' => 2.00],
            ['size' => 'Large', 'price' => 3.00]
        ];

        DB::table('formats')->insert($formatsData);
    }
}
