<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class iva_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ivas')->insert([
            'nombretaller' => 'Garaje Erreka',
            'nombredueno' => 'Javier Segurado Iruretagoyena',
            'dni' => '15885630J', 
            'rta' => '147',
            'direccion' => 'Pescaderia, 12 bajo',
            'telefono' => '943 39 08 81', 
            'correo' => 'errekapasaia@euskalnet.net',  
            'cod_postal' => '20110 Pasaia, Gipuzkoa', 
            'iva' => '21', 
            'euroshora' => '46',   
            'ref_cliente' => 'IBAN ES51 5003 1910 6144 48XX',     
        ]);
    }
}
