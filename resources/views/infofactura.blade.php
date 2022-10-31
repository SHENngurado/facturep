<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <a class="button" href="{{ url('/infofacturapdf') }}/{!!$factura->id!!}" style="display: block;margin-left: auto;margin-right: auto;width: 40%;">PDF - Descargar - Imprimir</a>
              <br>
        <!-- component -->
<div class="h-screen flex flex-col items-left justify-center background-blue">

    <!-- Card 1 -->
  <card class="py-7 px-5">
    <div class="grid grid-cols-6 gap-1">
      
      <!-- Description -->
      <div class="col-span-6">
        <p class="">Factura Nº: {!!$factura->cod_factura!!}</p>
        <p class="text-gray-500 ">Orden/Albaran: {!!$factura->or_id!!}</p>
        <p class="text-gray-500 ">Marca: {!!$factura->vehiculo->marca!!}</p>
        <p class="text-gray-500 ">Modelo: {!!$factura->vehiculo->modelo!!}</p>
        <p class="">Matricula: {!!$factura->vehiculo->matricula!!}</p>
        <p class="">KMS: {!!$factura->kms!!}</p>
      </div>
    </div>
  </card>
      <!-- Card 1 -->
  <card class="py-7 px-5">
    <div class="grid grid-cols-6 gap-1">
      
      <!-- Description -->
      <div class="col-span-6">
        <p class="">Cliente: {!!$factura->cliente->nombre!!} {!!$factura->cliente->apellido!!}</p>
        <p class="text-gray-500 ">Cod. Cliente: {!!$factura->cliente->id!!}</p>
        <p class="">CIF/DNI: {!!$factura->cliente->cifdni!!}</p>
        <p class="text-gray-500 ">tlf: {!!$factura->cliente->telefono!!}</p>
        <p class="text-gray-500 ">fecha: {!!$factura->created_at->format('d-m-Y')!!}</p>
        <p class="text-gray-500 ">Ref. Cliente: {!!$datos->ref_cliente!!}</p>
      </div>

    </div>
  </card>
  <!-- Mano de obra -->
  <br>
  <h1>Mano de obra</h1>
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Denominación
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Tiempo
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Precio
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Importe
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($factura->manodeobras as $manodeobra)
                <tr class="bg-white border-b">
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$manodeobra->nombre!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$manodeobra->tiempo!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$manodeobra->euroshora!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$manodeobra->importe!!}</td>
                </tr class="bg-white border-b">
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                  <th scope="col" class="px-6 py-3">
                    
                  </th>
                  <th scope="col" class="px-6 py-3">
                    
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Total mano de obra:
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {!!$summanodeobras!!}
                  </th>
                </tr>
              </tfoot>
            </table>
  <!-- Materiales y trabajos exteriores -->
  <h1>Materiales y trabajos exteriores</h1>
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Denominación
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Cantidad
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Precio
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Importe
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($consumibles as $consumible)
                <tr class="bg-white border-b">
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$consumible->nombre!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$consumible->cantidad!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$consumible->preciounidad!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$consumible->importe!!}</td>
                </tr class="bg-white border-b">
                @endforeach
              </tbody>
              <tfoot>
                  <tr>
                  <th scope="col" class="px-6 py-3">
                    
                  </th>
                  <th scope="col" class="px-6 py-3">
                    
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Total materiales:
                  </th>
                  <th scope="col" class="px-6 py-3">
                    {!!$sumconsumibles!!}
                  </th>
                </tr>
              </tfoot>
            </table>
            <BR>
            <!-- TOTAL -->
  <h1>TOTAL</h1>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Importe Neto
                  </th>
                  <th scope="col" class="px-6 py-3">
                    IVA %
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Importe IVA
                  </th>
                  <th scope="col" class="px-6 py-3">
                    TOTAL
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{!!$importetotal!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$factura->iva!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$iva!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$importetotaliva!!}</td>
                </tr class="bg-white border-b">
              </tbody>
            </table>
</div>
<a class="button" href="{{ url('/infofacturapdf') }}/{!!$factura->id!!}" style="display: block;margin-left: auto;margin-right: auto;width: 40%;">Imprimir factura</a>
            </div>
        </div>
    </div>
</x-app-layout>
