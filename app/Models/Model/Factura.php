<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable = [
        'vehiculo_id','cliente_id','or_id', 'kms', 'iva', 'facturaterminada', 'cod_factura', 'pagado'
    ];
    public function cliente(){
                return $this->belongsTo('App\Models\Model\Cliente','cliente_id','id');
                //
    }
    public function vehiculo(){
                return $this->belongsTo('App\Models\Model\Vehiculo','vehiculo_id','id');
                //
    }
        public function manodeobras(){
                return $this->hasMany('App\Models\Model\Manodeobra', 'factura_id');
    }
        public function consumibles(){
                return $this->hasMany('App\Models\Model\Consumible', 'factura_id');
    }
}
