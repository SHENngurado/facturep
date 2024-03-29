<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Iva;

class BaseController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }
    public function configuracion()
    {
        $configuracion = Iva::all()->first();

        return view('configuracion')->with([
            'configuracion'=>$configuracion
            ]);
    }
    public function editar(Request $req)
{

    Iva::where('id', 1)->update(['nombre' => $req->nombre, 'irpf' => $req->irpf, 'dni' => $req->dni, 'telefono' => $req->telefono, 'correo' => $req->correo, 'direccion' => $req->direccion, 'cod_postal' => $req->cod_postal, 'ref_cliente' => $req->ref_cliente, 'iva' => $req->iva]);
    $configuracion = Iva::all()->first();
    return view('configuracion')->with([
            'configuracion'=>$configuracion
            ]);  
}
}
