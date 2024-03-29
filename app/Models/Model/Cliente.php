<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre','telefono','correo','cifdni','direccion','cod_postal','contacto_nombre','contacto_telefono','contacto_correo'
    ];
    public function vehiculos(){
                return $this->hasMany('App\Models\Model\Vehiculo', 'cliente_id');
    }
    public function ors(){
                return $this->hasMany('App\Models\Model\OR', 'cliente_id');
    }
    public function facturas(){
                return $this->hasMany('App\Models\Model\Factura', 'cliente_id');
    }
}
