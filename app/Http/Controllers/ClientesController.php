<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\Cliente;
use App\Models\Model\Factura;
use App\Models\Model\Vehiculo;


class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes')->with([
            'clientes'=>$clientes
        ]);
    }
    public function buscarcliente(Request $req)
    {
        if($req->dni === null){
           $clientes = Cliente::all(); 
        }else{
            $clientes = Cliente::where('cifdni', $req->dni)->get();
        }
        if ($clientes->isEmpty()){
            $clientes = Cliente::where('nombre', $req->dni)->get();
        }

        return view('clientes')->with([
            'clientes'=>$clientes
        ]);
    }
    public function infocliente($cliente_id)
    {
        $cliente=Cliente::find($cliente_id);
        $facturas=Factura::where('cliente_id', $cliente_id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
        $hoteles=Vehiculo::where('cliente_id', $cliente_id)->get();
        return view('infocliente')->with([
            'facturas'=>$facturas,
            'cliente'=>$cliente,
            'hoteles'=>$hoteles,
        ]);
    }
    public function editcliente($cliente_id)
    {
        $cliente=Cliente::find($cliente_id);
        $facturas=Factura::where('cliente_id', $cliente_id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
        $hoteles=Vehiculo::where('cliente_id', $cliente_id)->get();
        return view('editcliente')->with([
            'facturas'=>$facturas,
            'cliente'=>$cliente,
            'hoteles'=>$hoteles,
        ]);
    }
    public function editclienteguardar(Request $req)
    {

        Cliente::where('id', $req->id)->update(['nombre' => $req->nombre, 'cifdni' => $req->cifdni, 'telefono' => $req->telefono, 'correo' => $req->correo, 'direccion' => $req->direccion, 'cod_postal' => $req->cod_postal, 'contacto_correo' => $req->contacto_correo, 'contacto_nombre' => $req->contacto_nombre, 'contacto_telefono' => $req->contacto_telefono]);

        $cliente=Cliente::find($req->id);
        $facturas=Factura::where('cliente_id', $req->id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
        $hoteles=Vehiculo::where('cliente_id', $req->id)->get();
        return view('infocliente')->with([
            'facturas'=>$facturas,
            'cliente'=>$cliente,
            'hoteles'=>$hoteles,
        ]);
    }
    public function newcliente()
    {
        return view('nuevocliente')->with([ 
        ]);
    }
    public function newclienteguardar(Request $req)
    {
        $cliente = new Cliente;
        $cliente->nombre = $req->nombre;
        $cliente->cifdni = $req->cifdni;
        $cliente->correo = $req->correo;
        $cliente->telefono = $req->telefono;
        $cliente->direccion = $req->direccion;
        $cliente->cod_postal = $req->cod_postal;
        $cliente->contacto_correo = $req->contacto_correo;
        $cliente->contacto_nombre = $req->contacto_nombre;
        $cliente->contacto_telefono = $req->contacto_telefono;
        $cliente->save();

        $clientesacado=Cliente::where('id', $cliente->id)->first();
        $facturas=Factura::where('cliente_id', $req->id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
        $hoteles=Vehiculo::where('cliente_id', $req->id)->get();
        return view('infocliente')->with([
            'facturas'=>$facturas,
            'cliente'=>$clientesacado,
            'hoteles'=>$hoteles,
        ]);
    }
}