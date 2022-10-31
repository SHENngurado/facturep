<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OR extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehiculo_id','cliente_id','kilometros','fecha_entrada', 'factura_id'
    ];

}
