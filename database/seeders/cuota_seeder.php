<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class cuota_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuotas')->insert([
            'nombre' => 'Q M TB',
            'importe' => '250',
            'descripcion' => 'Cuota marriot temporada baja',
            'hotel_id' => '1',
            'cliente_id' => '1',
            'activa' => 'no',
        ]);
    }
}
