<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iva extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre','dni', 'irpf', 'direccion', 'telefono', 'correo', 'cod_postal', 'iva', 'ref_cliente'
    ];
}
