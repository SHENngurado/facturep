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
            'nombre' => 'Hotel Rev',
            'direccion' => 'carrer repp 31',
            'cifdni' => '72484842C',
            'cliente_id' => '1',
            'cod_postal' => '20017 Rev',
            'telefono' => '616379241',
            'correo' => 'hotelrevinvent@gmail.com',
            'contacto_correo' => 'EricFerran@gmail.com',
            'contacto_nombre' => 'Eric Ferran',
            'contacto_telefono' => '616379241',
        ]);
    }
}
