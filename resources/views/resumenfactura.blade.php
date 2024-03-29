<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <!-- component -->

        <br>

        <div class="h-screen flex flex-col items-left justify-center background-blue elcentrador">

          <card class="border-gray-300 border-2 rounded-xl w-[30rem] py-7 px-5">
            <div class="grid grid-cols-6 gap-1">

              <!-- Description -->
              <div class="col-span-6">
                <p class="text-gray-500 ">{!!$factura->vehiculo->nombre!!}</p>
                <p class="text-gray-500 ">CIF/DNI: {!!$factura->vehiculo->cifdni!!}</p>
                <p class="text-gray-500 ">tlf: {!!$factura->vehiculo->telefono!!}</p>
                <p class="text-gray-500 ">fecha: {!!$factura->created_at->format('d-m-Y')!!}</p>
              </div>

            </div>
          </card>
          <!-- Mano de obra -->
          <br>
          <h3>Items</h3>
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Denominación
                </th>
                <th scope="col" class="px-6 py-3">
                  tipo
                </th>
                <th scope="col" class="px-6 py-3">
                  Datos
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
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$manodeobra->tipo!!}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$manodeobra->descripcion!!}</td>
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
                  Importe sin iva:
                </th>
                <th scope="col" class="px-6 py-3">
                  {!!$summanodeobras!!}
                </th>
              </tr>
            </tfoot>
          </table>
          <!-- TOTAL -->
          <br>
          <h3 style="color:red;">TOTAL</h3>
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Importe Neto
                </th>
                <th scope="col" class="px-6 py-3">
                  IVA {!!$factura->iva!!}%
                </th>
                <th scope="col" class="px-6 py-3">
                  IRPF -{!!$factura->irpf!!}%
                </th>
                <th scope="col" class="px-6 py-3">
                  TOTAL
                </th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{!!$importetotal!!}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$iva!!}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$cantidadirpf!!}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" style="font-weight: bold;">{!!$importetotalivairpf!!}</td>
              </tr class="bg-white border-b">
            </tbody>
          </table>
          <form method="post" enctype="multipart/form-data" action="{{ url('/guardarfactura') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <input hidden type="text" name="cod_factura" value="{!!$raw!!}/{!!$year!!}" />
            <input hidden type="text" name="or" value="{!!$or!!}" />
            <input hidden type="text" name="id" value="{!!$factura->id!!}" />

            <a href="{{ route('dashboard') }}" onclick="return confirm('estas segura que deseas borrar?');" class="btn btn-primary button">NO guardar</a> <button type="submit" class="btn btn-primary button" onclick="return confirm('guardar?');">Guardar Proforma</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
