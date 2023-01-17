<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="px-6">

                    <div class="text-center mt-2">
                        <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{!!$hotel->nombre!!}</h3>
                        <h5 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{!!$hotel->direccion!!} {!!$hotel->cod_postal!!}</h5>
                        <h5 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{!!$hotel->telefono!!} {!!$hotel->correo!!}</h5>
                        <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                            @if($hotel->cliente_id == "0")                        
                            No pertenece a grupo
                            @else
                            <a href="{{ url('/infocliente') }}/{!!$hotel->cliente->id!!}">{!!$hotel->cliente->nombre!!}</a>
                            @endif
                        </div>
                        <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                            @if($hotel->cliente_id == "0")                       
                            @else
                            {!!$hotel->cliente->telefono!!}  -  {!!$hotel->cliente->correo!!}
                            @endif
                        </div>
                    </div>
                    <!-- component tabla-->
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
                                            Fecha
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($facturas as $factura)
                                    <tr class="bg-white border-b">
                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><a href="{{ url('/infofactura') }}/{!!$factura->id!!}">{!!$factura->cod_factura!!}</a></td>
                                      <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {!!$factura->created_at->format('d-m-Y')!!}
                                    </td>
                                </tr class="bg-white border-b">
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- fin component tabla -->
            </div>
        </div>
    </div>
</div>
</x-app-layout>
