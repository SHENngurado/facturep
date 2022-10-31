<!-- component -->
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="relative max-w-md mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-16 py-2">

             <!-- component -->
                   <div class="bg-white overflow-hidden sm:rounded-lg px-3 py-2">
        <!--CONTENIDO-->
        
        <p>Buscar por codigo factura</p>

        <form method="post" enctype="multipart/form-data" action="{{ url('/buscafactura') }}" data-toogle="validator" role="form" autocomplete="off">
          {{ csrf_field() }}


          <div class="form-group">
            <input type="text" name="cod_factura" id="cod_factura" class="form-control input-sm btn" placeholder="Codigo factura" required>
            <button type="submit" class="btn btn-primary button">Buscar</button>
          </div>


        </form>
        <!--fin de contenido-->
      </div>
             <!-- This is an example component -->
             <div class="text-center mt-2 py-4">
                <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">Contabilidad</h3>

            </div>
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
                            Vehículo
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
                        <a href="{{ url('/editpagado') }}/{!!$factura->id!!}" class="button">{!!$factura->pagado!!}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{!!$factura->cliente->nombre!!} {!!$factura->cliente->apellido!!}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        {!!$factura->vehiculo->matricula!!}
                    </td>
                </tr class="bg-white border-b">
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</x-app-layout>


