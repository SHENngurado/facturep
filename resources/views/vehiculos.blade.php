<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!-- component -->
        <!--CONTENIDO-->

        <form method="post" enctype="multipart/form-data" action="{{ url('/buscarvehiculo') }}" data-toogle="validator" autocomplete="off" role="form" id="logo_form">
          {{ csrf_field() }}


          <div class="form-group">
            <input type="text" name="matricula" autocomplete="off" class="form-control input-sm btn" placeholder="matricula">
            <button type="submit" class="btn btn-primary button">Buscar</button>
          </div>


        </form>
        <!--fin de contenido-->
        <!-- This is an example component -->
        <div class="mt-6 py-6 border-t border-slate-200 text-center">
          <h3>Vehículos</h3>
        </div>

        <div class="max-w-2xl mx-auto">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Matrícula
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Marca y Modelo
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Cliente
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Editar
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($vehiculos as $vehiculo)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><a href="{{ url('/infovehiculo') }}/{!!$vehiculo->id!!}">{!!$vehiculo->matricula!!}</a></td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {!!$vehiculo->marca!!}-{!!$vehiculo->modelo!!}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {!!$vehiculo->cliente->nombre!!} {!!$vehiculo->cliente->apellido!!}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ url('/editvehiculo') }}/{!!$vehiculo->id!!}" class="button">editar</a>
                  </td>
                </tr class="bg-white border-b">
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>


