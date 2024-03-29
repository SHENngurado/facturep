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
use PDF;
use Str;
use URL;
use Carbon\Carbon;

class FacturasController extends Controller
{

public function buscarfactura(Request $req)
    {
        if($req->factura === null){
         $facturas = Factura::orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
     }else{
        $facturas = Factura::orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->where('cod_factura', $req->factura)->get();
    }

    return view('facturabuscada')->with([
        'facturas'=>$facturas
    ]);
}
public function verproformas()
    {

    $facturas = Factura::orderBy('created_at', 'DESC')->where('factura_guardada', 'proforma')->get();

    return view('proformas')->with([
        'facturas'=>$facturas
    ]);
}

public function editfactura($factura_id)
{
    $datos = Iva::all()->first();
    $factura=Factura::find($factura_id);
    $hotel = Vehiculo::where('id', '=', $factura->hotel_id)->first();

    return view('editfacturadatoscliente')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'hotel'=>$hotel
    ]);
}

public function editarproformaitems(Request $req)
{
    $datos = Iva::all()->first();
    $factura=Factura::where('id', '=', $req->factura_id)->first();
    $hotel = Vehiculo::where('id', '=', $req->hotel_id)->first();
    $cuotas = Cuota::where(['hotel_id'=>$req->id,'activa'=>'si'])->get();
    $items = Manodeobra::where('factura_id', '=', $req->factura_id)->get();

    return view('editfacturamanodeobra')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'hotel'=>$hotel,
        'items'=>$items,
        'cuotas'=>$cuotas
    ]);
}

public function annadiritem(Request $req)
{
    $datos = Iva::all()->first();
    $item = new Manodeobra;
    $item->nombre = $req->nombre;
    $item->descripcion = $req->descripcion;
    $item->tipo = $req->tipo;
    $item->importe = $req->total;
    $item->factura_id = $req->factura_id;
    $item->save();
    //sacamos el factura_id
    $facturasacada=Factura::where(['id'=>$req->factura_id ])->first();
    $items = Manodeobra::where(['factura_id'=>$req->factura_id ])->get();
    $cuotas = Cuota::where(['hotel_id'=>$facturasacada->hotel_id,'activa'=>'si'])->get();

    return view('editfacturamanodeobra')->with([
        'datos'=>$datos,
        'factura'=>$facturasacada,
        'items'=>$items,
        'cuotas'=>$cuotas
    ]);
}

public function borraritem($factura_id,$item_id)
{
    $datos = Iva::all()->first();

    $item=Manodeobra::where(['id'=>$item_id ])->first();
    $item->delete();
    
    //sacamos el factura_id
    $facturasacada=Factura::where(['id'=>$factura_id ])->first();
    $items = Manodeobra::where(['factura_id'=>$factura_id ])->get();
    $cuotas = Cuota::where(['hotel_id'=>$facturasacada->hotel_id,'activa'=>'si'])->get();

    return view('editfacturamanodeobra')->with([
        'datos'=>$datos,
        'factura'=>$facturasacada,
        'items'=>$items,
        'cuotas'=>$cuotas
    ]);
}

public function nuevafactura()
{
    $datos = Iva::all()->first();
    $clientes = Cliente::all();
    $vehiculos = Vehiculo::all();

    return view('nuevafactura')->with([
        'clientes'=>$clientes,
        'datos'=>$datos,
        'vehiculos'=>$vehiculos
    ]);
}

public function nuevafacturarellena(Request $req)
{
    $datos = Iva::all()->first();
    $hotel = Vehiculo::where('nombre', '=', $req->hotel)->first();



    if ($hotel === null) {
        return redirect()->back() ->with('info', 'Updated!');

    }else{
        return view('nuevafacturarellena')->with([
            'datos'=>$datos,
            'hotel'=>$hotel
        ]);

    }

}

public function create(Request $req)
{
    $datos = Iva::all()->first();
    //creamos el cliente primero
    $hotel = Vehiculo::where('id', '=', $req->id)->first();


    $factura = new Factura;
    $factura->hotel_id = $hotel->id;
    $factura->factura_pagada = "no";
    $factura->cod_factura = 0;
    $factura->factura_guardada = "no";
    $factura->iva = $datos->iva;
    $factura->irpf = $datos->irpf;
    $factura->save();
    //sacamos el factura_id
    $facturasacada=Factura::where(['id'=>$factura->id ])->first();
    $items= Manodeobra::where(['factura_id'=>$factura->id ])->get();
    $cuotas = Cuota::where(['hotel_id'=>$facturasacada->hotel_id,'activa'=>'si'])->get();


    return view('nfmanodeobra')->with([
        'datos'=>$datos,
        'factura'=>$facturasacada,
        'items'=>$items,
        'cuotas'=>$cuotas
    ]);
}

public function verresumen($factura_id)
{
    $datos = Iva::all()->first();
    $factura=Factura::find($factura_id);
    $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();

    $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
    $importetotal = $summanodeobras;
    $cantidadirpf = $importetotal*$factura->irpf/100;
    $cantidadirpf = number_format($cantidadirpf, 2, '.', '');
    $iva = $importetotal*$factura->iva/100;
    $iva = number_format($iva, 2, '.', '');
    $importetotaliva =  $importetotal + $iva;
    $importetotaliva = number_format($importetotaliva, 2, '.', '');
    $importetotalivairpf = $importetotaliva - $cantidadirpf;
    $platinum=Factura::where('factura_guardada','si')->count();
    $or = $platinum + 1;
    $raw = Factura::whereYear('created_at', \Carbon::now()->year)->where('factura_guardada', "si")->count();
    $date = new Carbon( $factura->created_at ); 
    $year = $date->year;
    $raw = $raw + 1;

    return view('resumenfactura')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'manodeobras'=>$manodeobras,
        'summanodeobras'=>$summanodeobras,
        'importetotal'=>$importetotal,
        'iva'=>$iva,
        'or'=>$or,
        'raw'=>$raw,
        'year'=>$year,
        'importetotaliva'=>$importetotaliva,
        'cantidadirpf'=>$cantidadirpf,
        'importetotalivairpf'=>$importetotalivairpf,
    ]);
}

public function guardarfactura(Request $req){

    Factura::where('id', $req->id)->update(['factura_guardada' => "proforma"]);

    $datos = Iva::all()->first();
    $factura=Factura::find($req->id);
    $manodeobras=Manodeobra::where('factura_id', $req->id)->get();

    $summanodeobras = Manodeobra::where('factura_id', $req->id)->sum('importe');
    $importetotal = $summanodeobras;
    $iva = $importetotal*$factura->iva/100;
    $iva = number_format($iva, 2, '.', '');
    $cantidadirpf = $importetotal*$factura->irpf/100;
    $cantidadirpf = number_format($cantidadirpf, 2, '.', '');
    $importetotaliva =  $importetotal + $iva;
    $importetotaliva = number_format($importetotaliva, 2, '.', '');
    $importetotalivairpf = $importetotaliva - $cantidadirpf;

    return view('infoproforma')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'manodeobras'=>$manodeobras,
        'summanodeobras'=>$summanodeobras,
        'importetotal'=>$importetotal,
        'iva'=>$iva,
        'importetotaliva'=>$importetotaliva,
        'cantidadirpf'=>$cantidadirpf,
        'importetotalivairpf'=>$importetotalivairpf,
    ]); 
}

public function infoproforma($factura_id)
{
    $datos = Iva::all()->first();
    $factura=Factura::find($factura_id);
    $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();

    $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
    $importetotal = $summanodeobras;
    $iva = $importetotal*$factura->iva/100;
    $iva = number_format($iva, 2, '.', '');
    $cantidadirpf = $importetotal*$factura->irpf/100;
    $cantidadirpf = number_format($cantidadirpf, 2, '.', '');
    $importetotaliva =  $importetotal + $iva;
    $importetotaliva = number_format($importetotaliva, 2, '.', '');
    $importetotalivairpf = $importetotaliva - $cantidadirpf;

    return view('infoproforma')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'manodeobras'=>$manodeobras,
        'summanodeobras'=>$summanodeobras,
        'importetotal'=>$importetotal,
        'iva'=>$iva,
        'importetotaliva'=>$importetotaliva,
        'cantidadirpf'=>$cantidadirpf,
        'importetotalivairpf'=>$importetotalivairpf,
    ]); 
}

public function guardarfacturafinal($factura_id){
    $factura = Factura::where('id', $factura_id)->first();
    $hotel = Vehiculo::where('id', $factura->vehiculo->id)->first();

    //codigo factura
    $platinum=Factura::where('factura_guardada','si')->count();
    $or = $platinum + 1;
    $raw = Factura::whereYear('created_at', \Carbon::now()->year)->where('factura_guardada', "si")->count();
    $date = new Carbon( $factura->created_at ); 
    $year = $date->year;
    $raw = $raw + 1;
    $codigofactura= ($hotel->cod_hotel.'00' .$raw . '/' . $year);
    Factura::where('id', $factura_id)->update(['factura_guardada' => "si", 'cod_factura' => $codigofactura]);


    $datos = Iva::all()->first();
    $factura=Factura::find($factura_id);
    $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();

    $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
    $importetotal = $summanodeobras;
    $iva = $importetotal*$factura->iva/100;
    $iva = number_format($iva, 2, '.', '');
    $cantidadirpf = $importetotal*$factura->irpf/100;
    $cantidadirpf = number_format($cantidadirpf, 2, '.', '');
    $importetotaliva =  $importetotal + $iva;
    $importetotaliva = number_format($importetotaliva, 2, '.', '');
    $importetotalivairpf = $importetotaliva - $cantidadirpf;

    return view('infofactura')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'manodeobras'=>$manodeobras,
        'summanodeobras'=>$summanodeobras,
        'importetotal'=>$importetotal,
        'iva'=>$iva,
        'importetotaliva'=>$importetotaliva,
        'cantidadirpf'=>$cantidadirpf,
        'importetotalivairpf'=>$importetotalivairpf,
    ]); 
}

public function pdf($factura_id)
{
    $datos = Iva::all()->first();
    $factura=Factura::find($factura_id);
    $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();

    $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
    $importetotal = $summanodeobras;
    $iva = $importetotal*$factura->iva/100;
    $iva = number_format($iva, 2, '.', '');
    $cantidadirpf = $importetotal*$factura->irpf/100;
    $cantidadirpf = number_format($cantidadirpf, 2, '.', '');
    $importetotaliva =  $importetotal + $iva;
    $importetotaliva = number_format($importetotaliva, 2, '.', '');
    $importetotalivairpf = $importetotaliva - $cantidadirpf;



    $pdf = PDF::loadView('infofacturapdf', array('datos'=>$datos,'factura'=>$factura, 'manodeobras'=>$manodeobras,'summanodeobras'=>$summanodeobras, 'importetotal'=>$importetotal, 'iva'=>$iva, 'importetotalivairpf'=>$importetotalivairpf, 'cantidadirpf'=>$cantidadirpf));
    return $pdf->stream($factura->created_at->format('d-m-Y')." ".$factura->cod_factura." ".$factura->vehiculo->nombre.".pdf");

}

public function pdfproforma($factura_id)
{
    $datos = Iva::all()->first();
    $factura=Factura::find($factura_id);
    $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();

    $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
    $importetotal = $summanodeobras;
    $iva = $importetotal*$factura->iva/100;
    $iva = number_format($iva, 2, '.', '');
    $cantidadirpf = $importetotal*$factura->irpf/100;
    $cantidadirpf = number_format($cantidadirpf, 2, '.', '');
    $importetotaliva =  $importetotal + $iva;
    $importetotaliva = number_format($importetotaliva, 2, '.', '');
    $importetotalivairpf = $importetotaliva - $cantidadirpf;



    $pdf = PDF::loadView('infoproformapdf', array('datos'=>$datos,'factura'=>$factura, 'manodeobras'=>$manodeobras,'summanodeobras'=>$summanodeobras, 'importetotal'=>$importetotal, 'iva'=>$iva, 'importetotalivairpf'=>$importetotalivairpf, 'cantidadirpf'=>$cantidadirpf));
    return $pdf->stream($factura->created_at->format('d-m-Y')." ".$factura->cod_factura." ".$factura->vehiculo->nombre.".pdf");

}

public function infofactura($factura_id)
{
    $datos = Iva::all()->first();
    $factura=Factura::find($factura_id);
    $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();

    $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
    $importetotal = $summanodeobras;
    $iva = $importetotal*$factura->iva/100;
    $iva = number_format($iva, 2, '.', '');
    $cantidadirpf = $importetotal*$factura->irpf/100;
    $cantidadirpf = number_format($cantidadirpf, 2, '.', '');
    $importetotaliva =  $importetotal + $iva;
    $importetotaliva = number_format($importetotaliva, 2, '.', '');
    $importetotalivairpf = $importetotaliva - $cantidadirpf;

    return view('infofactura')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'manodeobras'=>$manodeobras,
        'summanodeobras'=>$summanodeobras,
        'importetotal'=>$importetotal,
        'iva'=>$iva,
        'importetotaliva'=>$importetotaliva,
        'cantidadirpf'=>$cantidadirpf,
        'importetotalivairpf'=>$importetotalivairpf,
    ]); 
}

public function contabilidad()
{
    $facturas = Factura::where('factura_pagada','no')->where('factura_guardada','si')->get();

    return view('contabilidad')->with([
        'facturas'=>$facturas
    ]);
}
public function contabilidadrevisar()
{
    $facturas = Factura::where('factura_pagada','si')->where('factura_guardada','si')->get();

    return view('contabilidadrevisar')->with([
        'facturas'=>$facturas
    ]);
}

public function editpagado($factura_id)
{
    $factura = Factura::where('id', $factura_id)->first();
    if($factura->factura_pagada == "no"){
        Factura::where('id', $factura_id)->update(['factura_pagada' => "si"]);
    }elseif($factura->factura_pagada == "si"){
        Factura::where('id', $factura_id)->update(['factura_pagada' => "no"]);
    }
    $facturas = Factura::where('factura_pagada','no')->where('factura_guardada','si')->get();
    return view('contabilidad')->with([
        'facturas'=>$facturas
    ]);
}
public function editnopagado($factura_id)
{
    $factura = Factura::where('id', $factura_id)->first();
    if($factura->factura_pagada == "no"){
        Factura::where('id', $factura_id)->update(['factura_pagada' => "si"]);
    }elseif($factura->factura_pagada == "si"){
        Factura::where('id', $factura_id)->update(['factura_pagada' => "no"]);
    }
    $facturas = Factura::where('factura_pagada','no')->where('factura_guardada','si')->get();
    return view('contabilidad')->with([
        'facturas'=>$facturas
    ]);
}
public function buscafactura(Request $req)
{

    $facturas=Factura::where('cod_factura', $req->cod_factura)->where('factura_guardada','si')->get();
    return view('buscafactura')->with([
        'facturas'=>$facturas
    ]);
}

public function buscafacturacont(Request $req)
{

    $facturas=Factura::where('cod_factura', $req->cod_factura)->get();
    if($req->cod_factura == null){
        $facturas = Factura::where('factura_pagada','no')->where('factura_guardada','si')->get();
    }
    return view('contabilidad')->with([
        'facturas'=>$facturas
    ]);
}
}
