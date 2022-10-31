<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumible extends Model
{
    use HasFactory;
    protected $keyType = 'string';

    protected $fillable = [
        'nombre','preciounidad','cantidad','importe','factura_id'
    ];

    public function factura(){
                return $this->belongsTo('App\Models\Model\Factura','factura_id','id');
                //
    }
}
