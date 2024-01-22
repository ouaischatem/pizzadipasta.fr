<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Exécutez la commande de base de données.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'PizzaDiPasta',
            'email' => 'admin@pizzadipasta.fr',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        User::factory(10)->create();
    }
}

