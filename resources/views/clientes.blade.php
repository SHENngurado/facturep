<!-- component -->
  <x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!--CONTENIDO-->

        <form method="post" enctype="multipart/form-data" action="{{ url('/buscarcliente') }}" data-toogle="validator" role="form" id="logo_form" autocomplete="off">
          {{ csrf_field() }}


          <div class="form-group">
            <input type="text" name="dni" autocomplete="off" id="dni" class="form-control input-sm btn" placeholder="CIF/DNI o apellido">
            <button type="submit" class="btn btn-primary button">Buscar</button>
          </div>


        </form>
        <!--fin de contenido-->
        <!-- component -->
        <!-- This is an example component -->
        <div class="mt-6 py-6 border-t border-slate-200 text-center">
          <h3>Clientes</h3>
        </div>

        <div class="max-w-2xl mx-auto">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="p-4">
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Nombre
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Teléfono
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Correo
                  </th>
                  <th scope="col" class="px-6 py-3">
                    edit
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientes as $cliente)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><a href="{{ url('/infocliente') }}/{!!$cliente->id!!}">{!!$cliente->nombre!!} {!!$cliente->apellido!!}</a></td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {!!$cliente->telefono!!}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {!!$cliente->correo!!}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ url('/editcliente') }}/{!!$cliente->id!!}" class="button">editar</a>
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


