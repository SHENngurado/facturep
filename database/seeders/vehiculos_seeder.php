<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class vehiculos_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehiculos')->insert([
            'matricula' => '4799HRY',
            'marca' => 'Renault',
            'modelo' => 'Megane',
            'cliente_id' => '1',
        ]);
    }
}
