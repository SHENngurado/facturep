<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-4">
        <div class="text-center mt-2">
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{!!$cliente->nombre!!} {!!$cliente->apellido!!}</h3>
    <form method="post" enctype="multipart/form-data" action="{{ url('/editclienteguardar') }}" data-toogle="validator" role="form" id="logo_form" autocomplete="off">
    {{ csrf_field() }}
    <h1>EDITAR</h1>
    <table id="customers2">
      <tbody>
        <tr>
          <td>
            <br>
            <br>
            <nav>
              <ul>
                <li>Nombre:  <input type="text" name="nombre" value="{!!$cliente->nombre!!}"  /></li>
                <li>CIF/DNI:  <input type="text" name="cifdni" value="{!!$cliente->cifdni!!}" /></li>
                <input hidden type="text" name="id" value="{!!$cliente->id!!}" />
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
      <tbody>
        <tr>
          <td>
            <nav>
              <ul>
                <li>Telefono:  <input type="text" name="telefono" value="{!!$cliente->telefono!!}"  /></li>
                <li>Correo:  <input type="text" name="correo" value="{!!$cliente->correo!!}" size="30" /></li>
              </ul>
            </nav>
          </td>
           </tbody>
      <tbody>
          <td>
            <nav>
              <ul>
                <li>Dirección:  <input type="text" name="direccion" value="{!!$cliente->direccion!!}" size="30" /></li>
                <li>Cod_postal:  <input type="text" name="cod_postal" value="{!!$cliente->cod_postal!!}"  /></li>
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
            <tbody>
          <td>
            <nav>
              <ul>
                <li>Nombre contacto:  <input type="text" name="contacto_nombre" value="{!!$cliente->contacto_nombre!!}" size="30" /></li>
                <li>Telefono contacto:  <input type="text" name="contacto_telefono" value="{!!$cliente->contacto_telefono!!}"  /></li>
                <li>Correo contacto:  <input type="text" name="contacto_correo" value="{!!$cliente->contacto_correo!!}" /></li>
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
    </table>
    <br>

  </div>

  <button type="submit" class="btn btn-primary button">Guardar</button>
</form>
        </div>
</div>
</div>
</x-app-layout>
