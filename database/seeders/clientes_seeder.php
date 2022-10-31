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
            'nombre' => 'Iñigo',
            'apellido' => 'Segurado',
            'telefono' => '616379241',
            'correo' => 'segu_86@hotmail.com',
            'cifdni' => '72484842C',
            'calle' => 'Calzada de oleta',
            'portal' => '18',
            'piso' => '1',
            'puerta' => 'B',
            'cod_postal' => '20017',
            'poblacion' => 'Donostia',
            'provincia' => 'Gipuzkoa',
        ]);
        DB::table('clientes')->insert([
            'nombre' => 'Beñat',
            'apellido' => 'Segurado',
            'telefono' => '666554411',
            'correo' => Str::random(10).'@gmail.com',
            'cifdni' => '88445533H',
            'calle' => 'Calle san martin',
            'portal' => '11',
            'piso' => '5',
            'puerta' => 'Derecha',
            'cod_postal' => '20013',
            'poblacion' => 'Bilbao',
            'provincia' => 'Bizkaia',
        ]);
    }
}