<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Model\Cliente;
use App\Models\Model\Vehiculo;
use App\Models\Model\Factura;

class VehiculosController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();

        return view('vehiculos')->with([
            'vehiculos'=>$vehiculos
        ]);
    }
        public function buscarvehiculo(Request $req)
    {
        if($req->matricula === null){
           $vehiculos = Vehiculo::all(); 
        }else{
            $vehiculos = Vehiculo::where('matricula', $req->matricula)->get();
        }

        return view('vehiculos')->with([
            'vehiculos'=>$vehiculos
        ]);
    }

    public function infovehiculo($vehiculo_id)
    {
        $vehiculo=Vehiculo::find($vehiculo_id);
        $facturas=Factura::where('vehiculo_id', $vehiculo_id)->where('facturaterminada', 'si')->orderBy('created_at', 'DESC')->get();
        return view('infovehiculo')->with([
            'facturas'=>$facturas,
            'vehiculo'=>$vehiculo,
        ]);
    }
    public function editvehiculo($vehiculo_id)
    {
        $vehiculo=Vehiculo::find($vehiculo_id);
        $facturas=Factura::where('vehiculo_id', $vehiculo_id)->where('facturaterminada', 'si')->orderBy('created_at', 'DESC')->get();
        return view('editvehiculo')->with([
            'facturas'=>$facturas,
            'vehiculo'=>$vehiculo,
        ]);
    }
    public function editvehiculoguardar(Request $req)
    {

        Vehiculo::where('id', $req->id)->update(['matricula' => $req->matricula, 'marca' => $req->marca, 'modelo' => $req->modelo]);

        $vehiculo=Vehiculo::find($req->id);
        $facturas=Factura::where('vehiculo_id', $req->id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        return view('infovehiculo')->with([
            'facturas'=>$facturas,
            'vehiculo'=>$vehiculo,
        ]);
    }
    public function editvehiculovincular(Request $req)
    {
        $cliente=Cliente::where('cifdni', $req->cifdni)->first();
        

        if ($cliente === null) {
            return redirect()->back() ->with('info', 'Updated!');
            
        }else{
            Vehiculo::where('id', $req->id)->update(['cliente_id' => $cliente->id]);

            $vehiculo=Vehiculo::find($req->id);
            $facturas=Factura::where('vehiculo_id', $req->id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
            return view('infovehiculo')->with([
                'facturas'=>$facturas,
                'vehiculo'=>$vehiculo,
            ]);
        }
    }
    public function editvehiculonewclient(Request $req)
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
        Vehiculo::where('id', $req->id)->update(['cliente_id' => $clientesacado->id]);
        $vehiculo=Vehiculo::find($req->id);
        $facturas=Factura::where('vehiculo_id', $req->id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        return view('infovehiculo')->with([
            'facturas'=>$facturas,
            'vehiculo'=>$vehiculo,
        ]);
    }
    public function nuevovehiculo()
    {
        return view('nuevovehiculo')->with([ 
        ]);
    }
    public function newvehiculonewclient(Request $req)
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

        $vehiculo = new Vehiculo;
        $vehiculo->marca = $req->marca;
        $vehiculo->modelo = $req->modelo;
        $vehiculo->cliente_id = $clientesacado->id;
        $vehiculo->matricula = $req->matricula;
        $vehiculo->save();

        $vehiculosacado=Vehiculo::where('matricula', $req->matricula)->first();
        $facturas=Factura::where('vehiculo_id', $vehiculosacado->id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
        return view('infovehiculo')->with([
            'facturas'=>$facturas,
            'vehiculo'=>$vehiculo,
        ]);
    }
    public function newvehiculovincular(Request $req)
    {
        $cliente=Cliente::where('cifdni', $req->cifdni)->first();
        

        if ($cliente === null) {
            return redirect()->back() ->with('info', 'Updated!');
            
        }else{
            $vehiculo = new Vehiculo;
            $vehiculo->marca = $req->marca;
            $vehiculo->modelo = $req->modelo;
            $vehiculo->cliente_id = $cliente->id;
            $vehiculo->matricula = $req->matricula;
            $vehiculo->save();

            $vehiculosacado=Vehiculo::where('matricula', $req->matricula)->first();
            $facturas=Factura::where('vehiculo_id', $vehiculosacado->id)->orderBy('created_at', 'DESC')->where('facturaterminada', 'si')->get();
            return view('infovehiculo')->with([
                'facturas'=>$facturas,
                'vehiculo'=>$vehiculo,
            ]);
        }
    }
}
