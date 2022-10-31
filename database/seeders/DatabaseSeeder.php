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
        // \App\Models\User::factory(10)->create();
        $this->call(clientes_seeder::class);
        $this->call(vehiculos_seeder::class);
        $this->call(ORs_seeder::class);
        $this->call(facturas_seeder::class);
        $this->call(consumibles_seeder::class);
        $this->call(manodeobras_seeder::class);
        $this->call(iva_seeder::class);
    }
}
