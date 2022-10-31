<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula','marca','modelo','cliente_id'
    ];
    public function ors(){
                return $this->hasMany('App\Models\Model\OR', 'vehiculo_id');
    }
    public function facturas(){
                return $this->hasMany('App\Models\Model\Factura', 'vehiculo_id');
    }
    public function cliente(){
                return $this->belongsTo('App\Models\Model\Cliente','cliente_id','id');
                //
    }
}
