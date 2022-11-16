<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', 'BaseController@index')->name('welcome');
Route::group(['middleware' => 'auth'], function () { Route::get('/', function () { return view('dashboard'); }); });





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/facturas', function () {
        return view('facturas');
    })->name('facturas');
});

Route::get('/configuracion', 'BaseController@configuracion')->middleware('auth');
Route::post('/editarconfig/', 'BaseController@editar')->middleware('auth');

Route::get('/contabilidad', 'FacturasController@contabilidad')->middleware('auth')->name('contabilidad');

//CLIENTE
Route::get('/clientes', 'ClientesController@index')->middleware('auth');
Route::post('/buscarcliente/', 'ClientesController@buscarcliente')->middleware('auth');
Route::get('/infocliente/{cliente_id}', 'ClientesController@infocliente')->middleware('auth');
Route::get('/editcliente/{cliente_id}', 'ClientesController@editcliente')->middleware('auth');
Route::post('/editclienteguardar/', 'ClientesController@editclienteguardar')->middleware('auth');
Route::get('/newcliente', 'ClientesController@newcliente')->middleware('auth');
Route::post('/newclienteguardar/', 'ClientesController@newclienteguardar')->middleware('auth');

//VEHICULO
Route::get('/vehiculos', 'VehiculosController@index')->middleware('auth');
Route::post('/buscarvehiculo/', 'VehiculosController@buscarvehiculo')->middleware('auth');
Route::get('/nuevovehiculo', 'VehiculosController@nuevovehiculo')->middleware('auth');
Route::get('/infovehiculo/{vehiculo_id}', 'VehiculosController@infovehiculo')->middleware('auth');
Route::get('/editvehiculo/{vehiculo_id}', 'VehiculosController@editvehiculo')->middleware('auth');
Route::post('/editvehiculoguardar/', 'VehiculosController@editvehiculoguardar')->middleware('auth');
Route::post('/editvehiculovincular/', 'VehiculosController@editvehiculovincular')->middleware('auth');
Route::post('/editvehiculonewclient/', 'VehiculosController@editvehiculonewclient')->middleware('auth');
Route::post('/newvehiculovincular/', 'VehiculosController@newvehiculovincular')->middleware('auth');
Route::post('/newvehiculonewclient/', 'VehiculosController@newvehiculonewclient')->middleware('auth');


//FACTURA
Route::get('/infofactura/{factura_id}', 'FacturasController@infofactura')->middleware('auth');
Route::get('/editfactura/{factura_id}', 'FacturasController@editfactura')->middleware('auth');
Route::post('/editfacturamateriales', 'FacturasController@editfacturamateriales')->middleware('auth');
Route::post('/editfacturaguardar', 'FacturasController@editfacturaguardar')->middleware('auth');
Route::get('/resumenfactura/{factura_id}', 'FacturasController@resumenfactura')->middleware('auth');
Route::post('/buscarfactura/', 'FacturasController@buscarfactura')->middleware('auth');

Route::get('/infofacturapdf/{factura_id}', 'FacturasController@pdf')->middleware('auth');
Route::get('/nuevafactura', 'FacturasController@nuevafactura')->middleware('auth')->name('nuevafactura');;

Route::post('/nuevafacturarellena/', 'FacturasController@nuevafacturarellena')->middleware('auth');
Route::post('/guardarfactura/', 'FacturasController@guardarfactura')->middleware('auth');

Route::post('/crearfactura/', 'FacturasController@create')->middleware('auth');
Route::post('/crearmanodeobra/', 'FacturasController@nfmanodeobra')->middleware('auth');
Route::post('/crearconsumibles/', 'FacturasController@nfconsumibles')->middleware('auth');

Route::get('/editpagado/{factura_id}', 'FacturasController@editpagado')->middleware('auth');
Route::post('/buscafactura/', 'FacturasController@buscafactura')->middleware('auth');

Route::post('/annadiritem/', 'FacturasController@annadiritem')->middleware('auth');
Route::post('/annadircuota/', 'CuotaController@annadircuota')->middleware('auth');

Route::get('/verresumen/{factura_id}', 'FacturasController@verresumen')->middleware('auth');

Route::get('/proformas', 'FacturasController@verproformas')->middleware('auth');
Route::get('/infoproforma/{factura_id}', 'FacturasController@infoproforma')->middleware('auth');
Route::get('/proformatofactura/{factura_id}', 'FacturasController@guardarfacturafinal')->middleware('auth');
Route::get('/infoproformapdf/{factura_id}', 'FacturasController@pdfproforma')->middleware('auth');

Route::post('/editarproformaitems', 'FacturasController@editarproformaitems')->middleware('auth');
Route::get('/borraritem/{factura_id}/{item_id}', 'FacturasController@borraritem')->middleware('auth');

//DESGLOSE
Route::get('/desglose', 'ManodeobrasController@desglose')->middleware('auth');
Route::post('/desgloseanno/', 'ManodeobrasController@desgloseanno')->middleware('auth');

//CUOTAS
Route::get('/cuotas', 'CuotaController@selecthotelcuota')->middleware('auth');
Route::post('/vercuotasdehotel/', 'CuotaController@vercuotasdehotel')->middleware('auth');
Route::post('/annadircuotanormal/', 'CuotaController@annadircuotanormal')->middleware('auth');
Route::get('/borrarcuota/{hotel_id}/{cuota_id}', 'CuotaController@borrarcuota')->middleware('auth');
Route::post('/editcuota/', 'CuotaController@editcuota')->middleware('auth');
