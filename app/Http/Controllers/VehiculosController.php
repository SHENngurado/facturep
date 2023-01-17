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
        $hoteles = Vehiculo::all();

        return view('vehiculos')->with([
            'hoteles'=>$hoteles
        ]);
    }
    public function buscarvehiculo(Request $req)
    {
        if($req->matricula === null){
         $hoteles = Vehiculo::all(); 
     }else{
        $hoteles = Vehiculo::where('nombre', $req->matricula)->get();
    }

    return view('vehiculos')->with([
        'hoteles'=>$hoteles
    ]);
}

public function infovehiculo($vehiculo_id)
{
    $hotel=Vehiculo::find($vehiculo_id);
    $facturas=Factura::where('hotel_id', $vehiculo_id)->where('factura_guardada', 'si')->orderBy('created_at', 'DESC')->get();
    return view('infovehiculo')->with([
        'facturas'=>$facturas,
        'hotel'=>$hotel,
    ]);
}
public function editvehiculo($vehiculo_id)
{
    $hotel=Vehiculo::find($vehiculo_id);
    $facturas=Factura::where('hotel_id', $vehiculo_id)->where('factura_guardada', 'si')->orderBy('created_at', 'DESC')->get();
    return view('editvehiculo')->with([
        'facturas'=>$facturas,
        'hotel'=>$hotel,
    ]);
}
public function editvehiculoguardar(Request $req)
{

    Vehiculo::where('id', $req->id)->update(['nombre' => $req->nombre, 'cod_hotel' => $req->cod_hotel, 'cifdni' => $req->cifdni, 'direccion' => $req->direccion, 'cod_postal' => $req->cod_postal, 'correo' => $req->correo, 'telefono' => $req->telefono, 'contacto_nombre' => $req->contacto_nombre, 'contacto_correo' => $req->contacto_correo, 'contacto_telefono' => $req->contacto_telefono]);

    $hotel=Vehiculo::find($req->id);
    $facturas=Factura::where('hotel_id', $req->id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
    return view('infovehiculo')->with([
        'facturas'=>$facturas,
        'hotel'=>$hotel,
    ]);
}
public function editvehiculovincular(Request $req)
{
    $cliente=Cliente::where('cifdni', $req->cifdni)->first();


    if ($cliente === null) {
        return redirect()->back() ->with('info', 'Updated!');

    }else{
        Vehiculo::where('id', $req->id)->update(['cliente_id' => $cliente->id]);

        $hotel=Vehiculo::find($req->id);
        $facturas=Factura::where('hotel_id', $req->id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
        return view('infovehiculo')->with([
            'facturas'=>$facturas,
            'hotel'=>$hotel,
        ]);
    }
}
public function editvehiculonewclient(Request $req)
{
    $cliente = new Cliente;
    $cliente->nombre = $req->nombre;
    $cliente->cifdni = $req->cifdni;
    $cliente->correo = $req->correo;
    $cliente->telefono = $req->telefono;
    $cliente->direccion = $req->direccion;
    $cliente->cod_postal = $req->cod_postal;
    $cliente->contacto_nombre = $req->contacto_nombre;
    $cliente->contacto_telefono = $req->contacto_telefono;
    $cliente->contacto_correo = $req->contacto_correo;
    $cliente->save();

    $clientesacado=Cliente::where('id', $cliente->id)->first();
    Vehiculo::where('id', $req->id)->update(['cliente_id' => $clientesacado->id]);
    $hotel=Vehiculo::find($req->id);
    $facturas=Factura::where('hotel_id', $req->id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
    return view('infovehiculo')->with([
        'facturas'=>$facturas,
        'hotel'=>$hotel,
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
    $cliente->cifdni = $req->cifdni;
    $cliente->correo = $req->correo;
    $cliente->telefono = $req->telefono;
    $cliente->direccion = $req->direccion;
    $cliente->cod_postal = $req->cod_postal;
    $cliente->contacto_nombre = $req->contacto_nombre;
    $cliente->contacto_telefono = $req->contacto_telefono;
    $cliente->contacto_correo = $req->contacto_correo;
    $cliente->save();

    $clientesacado=Cliente::where('id', $cliente->id)->first();

    $vehiculo = new Vehiculo;
    $vehiculo->nombre = $req->nombrehotel;
    $vehiculo->cod_hotel = $req->cod_hotel;
    $vehiculo->cifdni = $req->cifdnihotel;
    $vehiculo->correo = $req->correohotel;
    $vehiculo->telefono = $req->telefonohotel;
    $vehiculo->direccion = $req->direccionhotel;
    $vehiculo->cod_postal = $req->cod_postalhotel;
    $vehiculo->contacto_nombre = $req->contacto_nombrehotel;
    $vehiculo->contacto_telefono = $req->contacto_telefonohotel;
    $vehiculo->contacto_correo = $req->contacto_correohotel;
    $vehiculo->cliente_id = $clientesacado->id;
    $vehiculo->save();

    $vehiculosacado=Vehiculo::where('id', $vehiculo->id)->first();
    $facturas=Factura::where('hotel_id', $vehiculosacado->id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
    return view('infovehiculo')->with([
        'facturas'=>$facturas,
        'hotel'=>$vehiculosacado,
    ]);
}
public function newvehiculovincular(Request $req)
{
    $cliente=Cliente::where('cifdni', $req->cifdnicliente)->first();


    if ($cliente === null) {
        $vehiculo = new Vehiculo;
        $vehiculo->nombre = $req->nombre;
        $vehiculo->cod_hotel = $req->cod_hotel;
        $vehiculo->cifdni = $req->cifdni;
        $vehiculo->correo = $req->correo;
        $vehiculo->telefono = $req->telefono;
        $vehiculo->direccion = $req->direccion;
        $vehiculo->cod_postal = $req->cod_postal;
        $vehiculo->contacto_nombre = $req->contacto_nombre;
        $vehiculo->contacto_telefono = $req->contacto_telefono;
        $vehiculo->contacto_correo = $req->contacto_correo;
        $vehiculo->cliente_id = "0";
        $vehiculo->save();

        $vehiculosacado=Vehiculo::where('id', $vehiculo->id)->first();
        $facturas=Factura::where('hotel_id', $vehiculosacado->id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
        return view('infovehiculo')->with([
            'facturas'=>$facturas,
            'hotel'=>$vehiculo,
        ]);

    }else{
        $vehiculo = new Vehiculo;
        $vehiculo->nombre = $req->nombre;
        $vehiculo->cifdni = $req->cifdni;
        $vehiculo->correo = $req->correo;
        $vehiculo->telefono = $req->telefono;
        $vehiculo->direccion = $req->direccion;
        $vehiculo->cod_postal = $req->cod_postal;
        $vehiculo->contacto_nombre = $req->contacto_nombre;
        $vehiculo->contacto_telefono = $req->contacto_telefono;
        $vehiculo->contacto_correo = $req->contacto_correo;
        $vehiculo->cliente_id = $cliente->id;
        $vehiculo->save();

        $vehiculosacado=Vehiculo::where('id', $vehiculo->id)->first();
        $facturas=Factura::where('hotel_id', $vehiculosacado->id)->orderBy('created_at', 'DESC')->where('factura_guardada', 'si')->get();
        return view('infovehiculo')->with([
            'facturas'=>$facturas,
            'hotel'=>$vehiculo,
        ]);
    }
}
}
