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
            'nombre' => 'Èric Ferran Janer',
            'dni' => '77618205-J', 
            'irpf' => '7',
            'direccion' => 'Maria Cardona 31',
            'telefono' => '673553700', 
            'correo' => 'eric.ferran@gmail.com',  
            'cod_postal' => 'Calella 08370', 
            'iva' => '21',  
            'ref_cliente' => 'IBAN ES51 5003 1910 6144 48XX',     
        ]);
    }
}
