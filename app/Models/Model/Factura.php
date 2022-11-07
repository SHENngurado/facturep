<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable = [
        'hotel_id','cliente_id', 'irpf', 'iva', 'factura_guardada', 'cod_factura', 'factura_pagada'
    ];
    public function cliente(){
                return $this->belongsTo('App\Models\Model\Cliente','cliente_id','id');
                //
    }
    public function vehiculo(){
                return $this->belongsTo('App\Models\Model\Vehiculo','hotel_id','id');
                //
    }
        public function manodeobras(){
                return $this->hasMany('App\Models\Model\Manodeobra', 'factura_id');
    }
        public function consumibles(){
                return $this->hasMany('App\Models\Model\Consumible', 'factura_id');
    }
}
