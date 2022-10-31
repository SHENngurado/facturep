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

class ManodeobrasController extends Controller
{
    public function desglose()
    {
        $manodeobras = Manodeobra::whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->whereHas('factura', function($q) {
            $q->where('facturaterminada', 'si');
        })
        ->get();

        $now = Carbon::now();
        $anno = $now->year;

        $enero = Manodeobra::whereMonth('created_at', '01')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $febrero = Manodeobra::whereMonth('created_at', '02')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $marzo = Manodeobra::whereMonth('created_at', '03')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $abril = Manodeobra::whereMonth('created_at', '04')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $mayo = Manodeobra::whereMonth('created_at', '05')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $junio = Manodeobra::whereMonth('created_at', '06')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $julio = Manodeobra::whereMonth('created_at', '07')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $agosto = Manodeobra::whereMonth('created_at', '08')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $septiembre = Manodeobra::whereMonth('created_at', '09')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $octubre = Manodeobra::whereMonth('created_at', '10')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $noviembre = Manodeobra::whereMonth('created_at', '11')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $diciembre = Manodeobra::whereMonth('created_at', '12')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');

        $sumatotal = $manodeobras->sum('importe');
        

        return view('desglose')->with([
            'enero'=>$enero,'febrero'=>$febrero,'marzo'=>$marzo,'abril'=>$abril,'mayo'=>$mayo,'junio'=>$junio,'julio'=>$julio,'agosto'=>$agosto,'septiembre'=>$septiembre,'octubre'=>$octubre,'noviembre'=>$noviembre,'diciembre'=>$diciembre,
            'anno'=>$anno,
            'manodeobras'=>$manodeobras,
            'sumatotal'=>$sumatotal,
        ]);
    }
    public function desgloseanno(Request $req)
    {
        $year = $req->anno;
        $anno = $req->anno;
        $monthinit = 1;
        $dayinit = 1;
        $hourinit = 00;
        $minuteinit = 00;
        $secondinit = 15;
        $tz = 'Europe/Madrid';
        $yearinit = Carbon::create($year, $monthinit, $dayinit, $hourinit, $minuteinit, $secondinit, $tz);

        $monthend = 12;
        $dayend = 31;
        $hourend = 23;
        $minuteend = 59;
        $secondend = 15;
        $yearend = Carbon::create($year, $monthend, $dayend, $hourend, $minuteend, $secondend, $tz);

        $manodeobras = Manodeobra::whereBetween('created_at', [$yearinit,$yearend])->whereHas('factura', function($q) {
            $q->where('facturaterminada', 'si');
        })
        ->get();

        $enero = Manodeobra::whereMonth('created_at', '01')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $febrero = Manodeobra::whereMonth('created_at', '02')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $marzo = Manodeobra::whereMonth('created_at', '03')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $abril = Manodeobra::whereMonth('created_at', '04')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $mayo = Manodeobra::whereMonth('created_at', '05')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $junio = Manodeobra::whereMonth('created_at', '06')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $julio = Manodeobra::whereMonth('created_at', '07')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $agosto = Manodeobra::whereMonth('created_at', '08')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $septiembre = Manodeobra::whereMonth('created_at', '09')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $octubre = Manodeobra::whereMonth('created_at', '10')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $noviembre = Manodeobra::whereMonth('created_at', '11')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');
        $diciembre = Manodeobra::whereMonth('created_at', '12')->whereYear('created_at', $anno)->whereHas('factura', function($q) {$q->where('facturaterminada', 'si');})->sum('importe');

        $sumatotal = $manodeobras->sum('importe');
        $anno = $req->anno;

        return view('desglose')->with([
            'enero'=>$enero,'febrero'=>$febrero,'marzo'=>$marzo,'abril'=>$abril,'mayo'=>$mayo,'junio'=>$junio,'julio'=>$julio,'agosto'=>$agosto,'septiembre'=>$septiembre,'octubre'=>$octubre,'noviembre'=>$noviembre,'diciembre'=>$diciembre,
            'yearinit'=>$yearinit,
            'yearend'=>$yearend,
            'anno'=>$anno,
            'manodeobras'=>$manodeobras,
            'sumatotal'=>$sumatotal,
        ]);
    }
}