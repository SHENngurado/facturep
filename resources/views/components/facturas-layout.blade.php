

        <!-- component -->
         <!--CONTENIDO-->

        <form method="post" enctype="multipart/form-data" action="{{ url('/buscarfactura') }}" data-toogle="validator" role="form" id="logo_form">
          {{ csrf_field() }}


          <div class="form-group">
            <input type="text" name="factura" autocomplete="off" id="factura" class="form-control input-sm btn" placeholder="codigo factura">
            <button type="submit" class="btn btn-primary button">Buscar</button>
          </div>


        </form>
        <!--fin de contenido-->
<!-- This is an example component -->
    <div class="mt-6 py-6 border-t border-slate-200 text-center">
                <h3>Facturas</h3>
             </div>

             <div class="max-w-2xl mx-auto">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Código
                        </th>
                        <th scope="col" class="px-6 py-3">
                            fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pagado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cliente
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hotel
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facturas as $factura)
            <tr class="bg-white border-b">

              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a href="{{ url('/infofactura') }}/{!!$factura->id!!}"><button class="btn btn-primary button">{!!$factura->cod_factura!!}</button></a>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {!!$factura->created_at->format('d-m-Y')!!}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {!!$factura->factura_pagada!!}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{!!$factura->cliente->nombre!!}</td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {!!$factura->vehiculo->nombre!!}
              </td>
            </tr class="bg-white border-b">
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
        </div>
    </div>