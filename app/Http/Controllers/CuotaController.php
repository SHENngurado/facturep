<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Factura;
use App\Models\Model\Cliente;
use App\Models\Model\Vehiculo;
use App\Models\Model\Manodeobra;
use App\Models\Model\Consumible;
use App\Models\Model\Iva;
use App\Models\Model\Cuota;

class CuotaController extends Controller
{
    public function annadircuota(Request $req)
{

    $facturasacada=Factura::where(['id'=>$req->factura_id ])->first();
    $cliente=Cliente::where(['id'=>$facturasacada->cliente_id ])->first();

    $datos = Iva::all()->first();
    $cuota = new Cuota;
    $cuota->nombre = $req->nombre;
    $cuota->descripcion = $req->descripcion;
    $cuota->importe = $req->importe;
    $cuota->hotel_id = $facturasacada->hotel_id;
    $cuota->cliente_id = $cliente->id;
    $cuota->activa = "si";
    $cuota->save();
    //sacamos el factura_id
    $items = Manodeobra::where(['factura_id'=>$req->factura_id ])->get();
    $cuotas = Cuota::where(['hotel_id'=>$facturasacada->hotel_id,'activa'=>'si'])->get();

    return view('nfmanodeobra')->with([
        'datos'=>$datos,
        'factura'=>$facturasacada,
        'items'=>$items,
        'cuotas'=>$cuotas
    ]);
}

public function selecthotelcuota()
    {

    $hoteles = Vehiculo::all();

    return view('cuotashotel')->with([
        'hoteles'=>$hoteles,
    ]);
}
public function vercuotasdehotel(Request $req)
    {

    $cuotas = Cuota::where(['hotel_id'=>$req->id,'activa'=>'si'])->get();
    $hotelseleccionado = Vehiculo::where(['id'=>$req->id ])->first();
    $hoteles = Vehiculo::all();

    return view('cuotas')->with([
        'cuotas'=>$cuotas,
        'hoteles'=>$hoteles,
        'hotelseleccionado'=>$hotelseleccionado,
    ]);
}

    public function annadircuotanormal(Request $req)
{
    $hoteles = Vehiculo::all();
    $hotelseleccionado= Vehiculo::where(['id'=>$req->hotel_id ])->first();
    $cliente=Cliente::where(['id'=>$hotelseleccionado->cliente_id ])->first();

    $datos = Iva::all()->first();
    $cuota = new Cuota;
    $cuota->nombre = $req->nombre;
    $cuota->descripcion = $req->descripcion;
    $cuota->importe = $req->importe;
    $cuota->hotel_id = $req->hotel_id;
    $cuota->cliente_id = $cliente->id;
    $cuota->activa = "si";
    $cuota->save();
    //sacamos el factura_id
    $cuotas = Cuota::where(['hotel_id'=>$req->hotel_id,'activa'=>'si'])->get();

    return view('cuotas')->with([
        'cuotas'=>$cuotas,
        'hoteles'=>$hoteles,
        'hotelseleccionado'=>$hotelseleccionado,
    ]);
}

public function borrarcuota($hotel_id,$cuota_id)
    {

    $hoteles = Vehiculo::all();
    $hotelseleccionado= Vehiculo::where(['id'=>$hotel_id ])->first();
    $cliente=Cliente::where(['id'=>$hotelseleccionado->cliente_id ])->first();
    Cuota::where('id', $cuota_id)->update(['activa' => "no"]);
    $cuotas = Cuota::where(['hotel_id'=>$hotel_id,'activa'=>'si'])->get();


    return view('cuotas')->with([
        'cuotas'=>$cuotas,
        'hoteles'=>$hoteles,
        'hotelseleccionado'=>$hotelseleccionado,
    ]);
}

public function editcuota(Request $req)
    {

    Cuota::where('id', $req->cuota_id)->update(['importe' => $req->importcuota]);
    $cuotas = Cuota::where(['hotel_id'=>$req->hotel_id,'activa'=>'si'])->get();
    $hotelseleccionado = Vehiculo::where(['id'=>$req->hotel_id ])->first();
    $hoteles = Vehiculo::all();

    return view('cuotas')->with([
        'cuotas'=>$cuotas,
        'hoteles'=>$hoteles,
        'hotelseleccionado'=>$hotelseleccionado,
    ]);
}

}
