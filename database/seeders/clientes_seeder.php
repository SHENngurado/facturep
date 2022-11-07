<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class clientes_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nombre' => 'grupo hoteles SA',
            'telefono' => '616379241',
            'correo' => 'gurphotelessh@hotmail.com',
            'cifdni' => '72484842C',
            'direccion' => 'Calzada de oleta 18 1-B',
            'cod_postal' => '20017 gipuzkoa',
            'contacto_correo' => 'segu_86@hotmail.com',
            'contacto_nombre' => 'Iñigo Segurado',
            'contacto_telefono' => '616379241',
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'marriott SA',
            'telefono' => '616379241',
            'correo' => 'marriottfalso@hotmail.com',
            'cifdni' => '72484843C',
            'direccion' => 'carrer del invent 15',
            'cod_postal' => '20017 barcelona',
            'contacto_correo' => 'darkpaladin@hotmail.com',
            'contacto_nombre' => 'Beñat Arzamendi',
            'contacto_telefono' => '616379241',
        ]);
    }
}