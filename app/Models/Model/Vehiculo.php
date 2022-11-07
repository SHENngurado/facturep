<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre','direccion','cifdni','cod_postal','telefono','correo','contacto_nombre','contacto_telefono','contacto_correo','cliente_id'
    ];
    public function facturas(){
                return $this->hasMany('App\Models\Model\Factura', 'hotel_id');
    }
    public function cliente(){
                return $this->belongsTo('App\Models\Model\Cliente','cliente_id','id');
                //
    }
}
