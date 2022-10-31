<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Model\Factura;
use App\Models\Model\Cliente;
use App\Models\Model\Vehiculo;
use App\Models\Model\Manodeobra;
use App\Models\Model\Consumible;
use App\Models\Model\Iva;
use PDF;
use Str;
use URL;
use Carbon\Carbon;

class FacturasController extends Controller
{

    public function buscarfactura(Request $req)
    {
        if($req->factura === null){
           $facturas = Factura::orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        }else{
            $facturas = Factura::orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->where('cod_factura', $req->factura)->get();
        }

        return view('facturabuscada')->with([
            'facturas'=>$facturas
        ]);
    }
    public function infofactura($factura_id)
    {
        $datos = Iva::all()->first();
        $factura=Factura::find($factura_id);
        $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();
        $consumibles=Consumible::where('factura_id', $factura_id)->get();

        $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
        $sumconsumibles = Consumible::where('factura_id', $factura_id)->sum('importe');
        $importetotal = $summanodeobras + $sumconsumibles;
        $iva = $importetotal*$datos->iva/100;
        $iva = number_format($iva, 2, '.', '');
        $importetotaliva =  $importetotal + $iva;
        $importetotaliva = number_format($importetotaliva, 2, '.', '');

        return view('infofactura')->with([
            'datos'=>$datos,
            'factura'=>$factura,
            'manodeobras'=>$manodeobras,
            'consumibles'=>$consumibles,
            'summanodeobras'=>$summanodeobras,
            'sumconsumibles'=>$sumconsumibles,
            'importetotal'=>$importetotal,
            'iva'=>$iva,
            'importetotaliva'=>$importetotaliva,
        ]);
    }
    
    public function editfactura($factura_id)
    {
        $datos = Iva::all()->first();
        $factura=Factura::find($factura_id);

        return view('editfacturadatoscliente')->with([
            'datos'=>$datos,
            'factura'=>$factura,
        ]);
    }
    public function editfacturamanodeobra(Request $req)
    {

        Factura::where('id', $req->id)->update(['kms' => $req->kms]);
        $manodeobras = Manodeobra::where('factura_id', $req->id)->get();
        $datos = Iva::all()->first();
        $factura=Factura::find($req->id);
        $manodeobra1 = Manodeobra::where('factura_id', $req->id)->first();
        $manodeobra2 = Manodeobra::where('factura_id', $req->id)->skip(1)->first();
        $manodeobra3 = Manodeobra::where('factura_id', $req->id)->skip(2)->first();
        $manodeobra4 = Manodeobra::where('factura_id', $req->id)->skip(3)->first();
        $manodeobra5 = Manodeobra::where('factura_id', $req->id)->skip(4)->first();
        $manodeobra6 = Manodeobra::where('factura_id', $req->id)->skip(5)->first();
        $manodeobra7 = Manodeobra::where('factura_id', $req->id)->skip(6)->first();
        $manodeobra8 = Manodeobra::where('factura_id', $req->id)->skip(7)->first();
        $manodeobra9 = Manodeobra::where('factura_id', $req->id)->skip(8)->first();
        $manodeobra10 = Manodeobra::where('factura_id', $req->id)->skip(9)->first();

        return view('editfacturamanodeobra')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'manodeobras'=>$manodeobras,
        'manodeobra1'=>$manodeobra1,
        'manodeobra2'=>$manodeobra2,
        'manodeobra3'=>$manodeobra3,
        'manodeobra4'=>$manodeobra4,
        'manodeobra5'=>$manodeobra5,
        'manodeobra6'=>$manodeobra6,
        'manodeobra7'=>$manodeobra7,
        'manodeobra8'=>$manodeobra8,
        'manodeobra9'=>$manodeobra9,
        'manodeobra10'=>$manodeobra10
    ]);
    }
        public function editfacturamateriales(Request $req)
    {
        $datos = Iva::all()->first();
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion01 === null) {    
        }else{
            if($req->manodeobra1 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion01;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo01);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe01);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra1)->update([
            'nombre' => $req->denominacion01,
            'tiempo' => Str::replace(',', '.', $req->tiempo01),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe01)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion02 === null) {    
        }else{
            if($req->manodeobra2 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion02;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo02);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe02);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra2)->update([
            'nombre' => $req->denominacion02,
            'tiempo' => Str::replace(',', '.', $req->tiempo02),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe02)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion03 === null) {    
        }else{
            if($req->manodeobra3 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion03;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo03);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe03);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra3)->update([
            'nombre' => $req->denominacion03,
            'tiempo' => Str::replace(',', '.', $req->tiempo03),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe03)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion04 === null) {    
        }else{
            if($req->manodeobra4 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion04;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo04);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe04);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra4)->update([
            'nombre' => $req->denominacion04,
            'tiempo' => Str::replace(',', '.', $req->tiempo04),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe04)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion05 === null) {    
        }else{
            if($req->manodeobra5 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion05;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo05);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe05);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra5)->update([
            'nombre' => $req->denominacion05,
            'tiempo' => Str::replace(',', '.', $req->tiempo05),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe05)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion06 === null) {    
        }else{
            if($req->manodeobra6 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion06;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo06);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe06);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra6)->update([
            'nombre' => $req->denominacion06,
            'tiempo' => Str::replace(',', '.', $req->tiempo06),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe06)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion07 === null) {    
        }else{
            if($req->manodeobra7 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion07;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo07);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe07);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra7)->update([
            'nombre' => $req->denominacion07,
            'tiempo' => Str::replace(',', '.', $req->tiempo07),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe07)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion08 === null) {    
        }else{
            if($req->manodeobra8 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion08;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo08);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe08);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra8)->update([
            'nombre' => $req->denominacion08,
            'tiempo' => Str::replace(',', '.', $req->tiempo08),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe08)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion09 === null) {    
        }else{
            if($req->manodeobra9 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion09;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo09);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe09);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra9)->update([
            'nombre' => $req->denominacion09,
            'tiempo' => Str::replace(',', '.', $req->tiempo09),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe09)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion10 === null) {    
        }else{
            if($req->manodeobra10 === null){
                $manodeobra = new Manodeobra;
                $manodeobra->nombre = $req->denominacion10;
                $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo10);
                $manodeobra->euroshora = $datos->euroshora;
                $manodeobra->importe = Str::replace(',', '.', $req->importe10);
                $manodeobra->factura_id = $req->factura_id;
                $manodeobra->save();
            }else{
        Manodeobra::where('id', $req->manodeobra10)->update([
            'nombre' => $req->denominacion10,
            'tiempo' => Str::replace(',', '.', $req->tiempo10),
            'euroshora' => $datos->euroshora,
            'importe' => Str::replace(',', '.', $req->importe10)]);
        }}
        //------------------------------------------------------------------------------------------------

        $materiales = Consumible::where('factura_id', $req->factura_id)->get();
        $datos = Iva::all()->first();
        $factura=Factura::find($req->factura_id);
        $materiales1 = Consumible::where('factura_id', $req->factura_id)->first();
        $materiales2 = Consumible::where('factura_id', $req->factura_id)->skip(1)->first();
        $materiales3 = Consumible::where('factura_id', $req->factura_id)->skip(2)->first();
        $materiales4 = Consumible::where('factura_id', $req->factura_id)->skip(3)->first();
        $materiales5 = Consumible::where('factura_id', $req->factura_id)->skip(4)->first();
        $materiales6 = Consumible::where('factura_id', $req->factura_id)->skip(5)->first();
        $materiales7 = Consumible::where('factura_id', $req->factura_id)->skip(6)->first();
        $materiales8 = Consumible::where('factura_id', $req->factura_id)->skip(7)->first();
        $materiales9 = Consumible::where('factura_id', $req->factura_id)->skip(8)->first();
        $materiales10 = Consumible::where('factura_id', $req->factura_id)->skip(9)->first();

        return view('editfacturamateriales')->with([
        'datos'=>$datos,
        'factura'=>$factura,
        'materiales'=>$materiales,
        'materiales1'=>$materiales1,
        'materiales2'=>$materiales2,
        'materiales3'=>$materiales3,
        'materiales4'=>$materiales4,
        'materiales5'=>$materiales5,
        'materiales6'=>$materiales6,
        'materiales7'=>$materiales7,
        'materiales8'=>$materiales8,
        'materiales9'=>$materiales9,
        'materiales10'=>$materiales10
    ]);
    }
//----------------------------------------------------------------------------------------------------------------------------EDIT MATERIALES
    public function editfacturaguardar(Request $req)
    {
        $datos = Iva::all()->first();
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion01 === null) {    
        }else{
            if($req->materiales1 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion01;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad01);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad01);
                $consumible->importe = Str::replace(',', '.', $req->importe01);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales1)->update([
            'nombre' => $req->denominacion01,
            'cantidad' => Str::replace(',', '.', $req->cantidad01),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad01),
            'importe' => Str::replace(',', '.', $req->importe01)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion02 === null) {    
        }else{
            if($req->materiales2 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion02;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad02);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad02);
                $consumible->importe = Str::replace(',', '.', $req->importe02);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales2)->update([
            'nombre' => $req->denominacion02,
            'cantidad' => Str::replace(',', '.', $req->cantidad02),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad02),
            'importe' => Str::replace(',', '.', $req->importe02)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion03 === null) {    
        }else{
            if($req->materiales3 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion03;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad03);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad03);
                $consumible->importe = Str::replace(',', '.', $req->importe03);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales3)->update([
            'nombre' => $req->denominacion03,
            'cantidad' => Str::replace(',', '.', $req->cantidad03),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad03),
            'importe' => Str::replace(',', '.', $req->importe03)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion04 === null) {    
        }else{
            if($req->materiales4 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion04;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad04);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad04);
                $consumible->importe = Str::replace(',', '.', $req->importe04);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales4)->update([
            'nombre' => $req->denominacion04,
            'cantidad' => Str::replace(',', '.', $req->cantidad04),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad04),
            'importe' => Str::replace(',', '.', $req->importe04)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion05 === null) {    
        }else{
            if($req->materiales5 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion05;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad05);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad05);
                $consumible->importe = Str::replace(',', '.', $req->importe05);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales5)->update([
            'nombre' => $req->denominacion05,
            'cantidad' => Str::replace(',', '.', $req->cantidad05),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad05),
            'importe' => Str::replace(',', '.', $req->importe05)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion06 === null) {    
        }else{
            if($req->materiales6 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion06;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad06);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad06);
                $consumible->importe = Str::replace(',', '.', $req->importe06);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales6)->update([
            'nombre' => $req->denominacion06,
            'cantidad' => Str::replace(',', '.', $req->cantidad06),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad06),
            'importe' => Str::replace(',', '.', $req->importe06)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion07 === null) {    
        }else{
            if($req->materiales7 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion07;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad07);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad07);
                $consumible->importe = Str::replace(',', '.', $req->importe07);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales7)->update([
            'nombre' => $req->denominacion07,
            'cantidad' => Str::replace(',', '.', $req->cantidad07),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad07),
            'importe' => Str::replace(',', '.', $req->importe07)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion08 === null) {    
        }else{
            if($req->materiales8 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion08;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad08);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad08);
                $consumible->importe = Str::replace(',', '.', $req->importe08);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales8)->update([
            'nombre' => $req->denominacion08,
            'cantidad' => Str::replace(',', '.', $req->cantidad08),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad08),
            'importe' => Str::replace(',', '.', $req->importe08)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion09 === null) {    
        }else{
            if($req->materiales9 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion09;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad09);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad09);
                $consumible->importe = Str::replace(',', '.', $req->importe09);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales9)->update([
            'nombre' => $req->denominacion09,
            'cantidad' => Str::replace(',', '.', $req->cantidad09),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad09),
            'importe' => Str::replace(',', '.', $req->importe09)]);
        }}
        //------------------------------------------------------------------------------------------------
        if ($req->denominacion10 === null) {    
        }else{
            if($req->materiales10 === null){
                $consumible = new Consumible;
                $consumible->nombre = $req->denominacion10;
                $consumible->cantidad = Str::replace(',', '.', $req->cantidad10);
                $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad10);
                $consumible->importe = Str::replace(',', '.', $req->importe10);
                $consumible->factura_id = $req->factura_id;
                $consumible->save();
            }else{
        Consumible::where('id', $req->materiales10)->update([
            'nombre' => $req->denominacion10,
            'cantidad' => Str::replace(',', '.', $req->cantidad10),
            'preciounidad' => Str::replace(',', '.', $req->preciounidad10),
            'importe' => Str::replace(',', '.', $req->importe10)]);
        }}
        //------------------------------------------------------------------------------------------------

        $datos = Iva::all()->first();
        $factura=Factura::find($req->factura_id);
        $manodeobras=Manodeobra::where('factura_id', $req->factura_id)->get();
        $consumibles=Consumible::where('factura_id', $req->factura_id)->get();

        $summanodeobras = Manodeobra::where('factura_id', $req->factura_id)->sum('importe');
        $sumconsumibles = Consumible::where('factura_id', $req->factura_id)->sum('importe');
        $importetotal = $summanodeobras + $sumconsumibles;
        $iva = $importetotal*21/100;
        $importetotaliva =  $importetotal + $iva;
        $importetotaliva = number_format($importetotaliva, 2, '.', '');

        return view('infofactura')->with([
            'datos'=>$datos,
            'factura'=>$factura,
            'manodeobras'=>$manodeobras,
            'consumibles'=>$consumibles,
            'summanodeobras'=>$summanodeobras,
            'sumconsumibles'=>$sumconsumibles,
            'importetotal'=>$importetotal,
            'iva'=>$iva,
            'importetotaliva'=>$importetotaliva,
        ]);
    }
    public function resumenfactura($factura_id)
    {
        $datos = Iva::all()->first();
        $factura=Factura::find($factura_id);
        $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();
        $consumibles=Consumible::where('factura_id', $factura_id)->get();

        $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
        $sumconsumibles = Consumible::where('factura_id', $factura_id)->sum('importe');
        $importetotal = $summanodeobras + $sumconsumibles;
        $iva = $importetotal*$datos->iva/100;
        $iva = number_format($iva, 2, '.', '');
        $importetotaliva =  $importetotal + $iva;
        $importetotaliva = number_format($importetotaliva, 2, '.', '');
        $platinum=Factura::where('facturaterminada','si')->count();
        $or = $platinum + 1;
        $raw = Factura::whereYear('created_at', \Carbon::now()->year)->where('facturaterminada', "si")->count();
        $date = new Carbon( $factura->created_at ); 
        $year = $date->year;
        $raw = $raw + 1;

        return view('resumenfactura')->with([
            'datos'=>$datos,
            'factura'=>$factura,
            'manodeobras'=>$manodeobras,
            'consumibles'=>$consumibles,
            'summanodeobras'=>$summanodeobras,
            'sumconsumibles'=>$sumconsumibles,
            'importetotal'=>$importetotal,
            'iva'=>$iva,
            'or'=>$or,
            'raw'=>$raw,
            'year'=>$year,
            'importetotaliva'=>$importetotaliva,
        ]);
    }
    public function pdf($factura_id)
    {
        $datos = Iva::all()->first();
        $factura=Factura::find($factura_id);
        $manodeobras=Manodeobra::where('factura_id', $factura_id)->get();
        $consumibles=Consumible::where('factura_id', $factura_id)->get();
        $summanodeobras = Manodeobra::where('factura_id', $factura_id)->sum('importe');
        $sumconsumibles = Consumible::where('factura_id', $factura_id)->sum('importe');
        $importetotal = $summanodeobras + $sumconsumibles;
        $iva = $importetotal*21/100;
        $importetotaliva =  $importetotal + $iva;
        $importetotaliva = number_format($importetotaliva, 2, '.', '');



        $pdf = PDF::loadView('infofacturapdf', array('datos'=>$datos,'factura'=>$factura, 'manodeobras'=>$manodeobras, 'consumibles'=>$consumibles, 'summanodeobras'=>$summanodeobras, 'sumconsumibles'=>$sumconsumibles, 'importetotal'=>$importetotal, 'iva'=>$iva, 'importetotaliva'=>$importetotaliva));
        return $pdf->stream($factura->created_at->format('d-m-Y')." ".$factura->vehiculo->matricula." ".$factura->cliente->apellido." ".$factura->cliente->nombre.".pdf");

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
        $vehiculo = Vehiculo::where('matricula', '=', $req->matricula)->first();


        
        if ($vehiculo === null) {
            return redirect()->back() ->with('info', 'Updated!');
            
        }else{
            return view('nuevafacturarellena')->with([
                'datos'=>$datos,
                'vehiculo'=>$vehiculo
            ]);

        }
        
    }

    public function guardarfactura(Request $req){

    Factura::where('id', $req->id)->update(['facturaterminada' => "si", 'cod_factura' => $req->cod_factura, 'or_id' => $req->or]);

    $datos = Iva::all()->first();
        $factura=Factura::find($req->id);
        $manodeobras=Manodeobra::where('factura_id', $req->id)->get();
        $consumibles=Consumible::where('factura_id', $req->id)->get();

        $summanodeobras = Manodeobra::where('factura_id', $req->id)->sum('importe');
        $sumconsumibles = Consumible::where('factura_id', $req->id)->sum('importe');
        $importetotal = $summanodeobras + $sumconsumibles;
        $iva = $importetotal*21/100;
        $importetotaliva =  $importetotal + $iva;
        $importetotaliva = number_format($importetotaliva, 2, '.', '');

        return view('infofactura')->with([
            'datos'=>$datos,
            'factura'=>$factura,
            'manodeobras'=>$manodeobras,
            'consumibles'=>$consumibles,
            'summanodeobras'=>$summanodeobras,
            'sumconsumibles'=>$sumconsumibles,
            'importetotal'=>$importetotal,
            'iva'=>$iva,
            'importetotaliva'=>$importetotaliva,
        ]); 
}
    public function create(Request $req)
{
    $datos = Iva::all()->first();
    //creamos el cliente primero
    $clienteexiste = Cliente::where('cifdni', '=', $req->dni)->first();
    if ($clienteexiste === null) {
        $cliente = new Cliente;
        $cliente->nombre = $req->nombre;
        $cliente->apellido = $req->apellido;
        $cliente->cifdni = $req->dni;
        $cliente->correo = $req->correo;
        $cliente->telefono = $req->telefono;
        $cliente->calle = $req->calle;
        $cliente->portal = $req->piso;
        $cliente->piso = $req->piso;
        $cliente->puerta = $req->puerta;
        $cliente->cod_postal = $req->cod_postal;
        $cliente->poblacion = $req->poblacion;
        $cliente->provincia = $req->provincia;
        $cliente->save();
    }
    
    //sacamos el cliente_id
    $clientesacado=Cliente::where(['cifdni'=>$req->dni ])->first();
    //creamos el coche ahora
    $vehiculoexiste = Vehiculo::where('matricula', '=', $req->matricula)->first();
    if ($vehiculoexiste === null) {
        //si el vehiculo no existe lo creamos
        $vehiculo = new Vehiculo;
        $vehiculo->marca = $req->marca;
        $vehiculo->modelo = $req->modelo;
        $vehiculo->cliente_id = $clientesacado->id;
        $vehiculo->matricula = $req->matricula;
        $vehiculo->save();

    }
    
    //sacamos el vehiculo_id
    $vehiculosacado=Vehiculo::where(['matricula'=>$req->matricula ])->first();
    //creamos la factura
    $factura = new Factura;
    $factura->cliente_id = $clientesacado->id;
    $factura->or_id = 0;
    $factura->pagado = "no";
    $factura->cod_factura = 0;
    $factura->facturaterminada = "no";
    $factura->vehiculo_id = $vehiculosacado->id;
    $factura->kms = $req->kms;
    $factura->iva = $datos->iva;
    $factura->save();
    //sacamos el factura_id
    $facturasacada=Factura::where(['cliente_id'=>$clientesacado->id ])->latest()->first();

    return view('nfmanodeobra')->with([
        'datos'=>$datos,
        'factura'=>$facturasacada->id
    ]);
    //return redirect()->action([FacturasController::class, 'nfmanodeobra'], ['factura_id' => $facturasacada->id]);
}


public function nfmanodeobra(Request $req)
{
    $datos = Iva::all()->first();
    $facturasacada=Factura::where(['id'=>$req->factura_id ])->latest()->first();

    if ($req->denominacion01 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion01;
        $manodeobra->tiempo =  Str::replace(',', '.', $req->tiempo01);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe01);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion02 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion02;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo02);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe02);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion03 == null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion03;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo03);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe03);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion04 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion04;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo04);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe04);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion05 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion05;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo05);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe05);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion06 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion06;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo06);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe06);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion07 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion07;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo07);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe07);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion08 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion08;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo08);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe08);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion09 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion09;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo09);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe09);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    if ($req->denominacion10 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $manodeobra = new Manodeobra;
        $manodeobra->nombre = $req->denominacion10;
        $manodeobra->tiempo = Str::replace(',', '.', $req->tiempo10);
        $manodeobra->euroshora = $datos->euroshora;
        $manodeobra->importe = Str::replace(',', '.', $req->importe10);
        $manodeobra->factura_id = $req->factura_id;
        $manodeobra->save();
    }
    
    return view('nfconsumibles')->with([
        'datos'=>$datos,
        'factura'=>$facturasacada->id
    ]);

}
public function nfconsumibles(Request $req)
{
    $datos = Iva::all()->first();
    $facturasacada=Factura::where(['id'=>$req->factura_id ])->latest()->first();

    if ($req->denominacion01 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion01;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad01);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad01);
        $consumible->importe = Str::replace(',', '.', $req->importe01);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion02 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion02;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad02);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad02);
        $consumible->importe = Str::replace(',', '.', $req->importe02);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion03 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion03;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad03);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad03);
        $consumible->importe = Str::replace(',', '.', $req->importe03);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion04 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion04;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad04);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad04);
        $consumible->importe = Str::replace(',', '.', $req->importe04);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion05 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion05;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad05);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad05);
        $consumible->importe = Str::replace(',', '.', $req->importe05);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion06 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion06;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad06);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad06);
        $consumible->importe = Str::replace(',', '.', $req->importe06);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion07 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion07;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad07);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad07);
        $consumible->importe = Str::replace(',', '.', $req->importe07);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion08 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion08;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad08);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad08);
        $consumible->importe = Str::replace(',', '.', $req->importe08);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion09 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion09;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad09);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad09);
        $consumible->importe = Str::replace(',', '.', $req->importe09);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    if ($req->denominacion10 === null) {    
    }else{
        //si el vehiculo no existe lo creamos
        $consumible = new Consumible;
        $consumible->nombre = $req->denominacion10;
        $consumible->cantidad = Str::replace(',', '.', $req->cantidad10);
        $consumible->preciounidad = Str::replace(',', '.', $req->preciounidad10);
        $consumible->importe = Str::replace(',', '.', $req->importe10);
        $consumible->factura_id = $req->factura_id;
        $consumible->save();
    }
    
    return redirect()->action([FacturasController::class, 'resumenfactura'], ['factura_id' => $facturasacada->id]);

}

public function contabilidad()
    {
        $facturas = Factura::where('pagado','no')->where('facturaterminada','si')->get();

        return view('contabilidad')->with([
            'facturas'=>$facturas
            ]);
    }

public function editpagado($factura_id)
    {
        $factura = Factura::where('id', $factura_id)->first();
        if($factura->pagado == "no"){
        Factura::where('id', $factura_id)->update(['pagado' => "si"]);
        }elseif($factura->pagado == "si"){
        Factura::where('id', $factura_id)->update(['pagado' => "no"]);
        }
        $facturas = Factura::where('pagado','no')->where('facturaterminada','si')->get();
        return view('contabilidad')->with([
            'facturas'=>$facturas
            ]);
    }
public function buscafactura(Request $req)
    {
        
        $facturas=Factura::where('cod_factura', $req->cod_factura)->get();
        return view('buscafactura')->with([
            'facturas'=>$facturas
            ]);
    }

}
