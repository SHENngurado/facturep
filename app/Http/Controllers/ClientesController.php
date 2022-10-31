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
            $clientes = Cliente::where('apellido', $req->dni)->get();
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
        $facturas=Factura::where('cliente_id', $cliente_id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        $vehiculos=Vehiculo::where('cliente_id', $cliente_id)->get();
        return view('infocliente')->with([
            'facturas'=>$facturas,
            'cliente'=>$cliente,
            'vehiculos'=>$vehiculos,
        ]);
    }
    public function editcliente($cliente_id)
    {
        $cliente=Cliente::find($cliente_id);
        $facturas=Factura::where('cliente_id', $cliente_id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        $vehiculos=Vehiculo::where('cliente_id', $cliente_id)->get();
        return view('editcliente')->with([
            'facturas'=>$facturas,
            'cliente'=>$cliente,
            'vehiculos'=>$vehiculos,
        ]);
    }
    public function editclienteguardar(Request $req)
    {

        Cliente::where('id', $req->id)->update(['nombre' => $req->nombre, 'apellido' => $req->apellido, 'cifdni' => $req->cifdni, 'telefono' => $req->telefono, 'correo' => $req->correo, 'calle' => $req->calle, 'portal' => $req->portal, 'piso' => $req->piso, 'puerta' => $req->puerta, 'cod_postal' => $req->cod_postal, 'poblacion' => $req->poblacion, 'provincia' => $req->provincia]);

        $cliente=Cliente::find($req->id);
        $facturas=Factura::where('cliente_id', $req->id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        $vehiculos=Vehiculo::where('cliente_id', $req->id)->get();
        return view('infocliente')->with([
            'facturas'=>$facturas,
            'cliente'=>$cliente,
            'vehiculos'=>$vehiculos,
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

        $clientesacado=Cliente::where('cifdni', $req->dni)->first();
        $facturas=Factura::where('cliente_id', $req->id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        $vehiculos=Vehiculo::where('cliente_id', $req->id)->get();
        return view('infocliente')->with([
            'facturas'=>$facturas,
            'cliente'=>$clientesacado,
            'vehiculos'=>$vehiculos,
        ]);
    }
}