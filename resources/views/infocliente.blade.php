<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="relative max-w-md mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-16 py-6">
    <div class="px-6">
        <div class="flex flex-wrap justify-center">
            <div class="w-full flex justify-center">
                <div class="relative">
                    <img src="https://github.com/creativetimofficial/soft-ui-dashboard-tailwind/blob/main/build/assets/img/team-2.jpg?raw=true" class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]"/>
                </div>
            </div>
        </div>
        <div class="text-center mt-2">
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{!!$cliente->nombre!!} {!!$cliente->apellido!!}</h3>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                {!!$cliente->cifdni!!}
            </div>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                {!!$cliente->telefono!!}  -  {!!$cliente->correo!!}
            </div>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                {!!$cliente->calle!!} {!!$cliente->portal!!} {!!$cliente->piso!!}-{!!$cliente->puerta!!} 
            </div>
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                {!!$cliente->cod_postal!!} {!!$cliente->poblacion!!} {!!$cliente->provincia!!}
            </div>
        </div>
        <!-- component tabla-->
<!-- This is an example component -->
            <div class="mt-6 py-6 border-t border-slate-200 text-center">
                <h3>Vehiculos</h3>
             </div>
<div class="max-w-2xl mx-auto">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Matricula
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Marca
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Modelo
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehiculos as $vehiculo)
            <tr class="bg-white border-b">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><a href="{{ url('/infovehiculo') }}/{!!$vehiculo->id!!}">{!!$vehiculo->matricula!!}</a></td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {!!$vehiculo->marca!!}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {!!$vehiculo->modelo!!}
              </td>
            </tr class="bg-white border-b">
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- fin component tabla -->

        <!-- component -->
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
                        <th scope="col" class="px-6 py-3">
                            Vehículo
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
    </div>
</x-app-layout>
