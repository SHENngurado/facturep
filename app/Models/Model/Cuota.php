<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id','cliente_id', 'nombre', 'importe', 'descripcion'
    ];
}
