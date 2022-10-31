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
                <li>Apellido:  <input type="text" name="apellido" value="{!!$cliente->apellido!!}" size="30"  /></li>
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
                <li>Calle:  <input type="text" name="calle" value="{!!$cliente->calle!!}" size="30" /></li>
                <li>Portal:  <input type="text" name="portal" value="{!!$cliente->portal!!}"  /></li>
                <li>Piso:  <input type="text" name="piso" value="{!!$cliente->piso!!}" /></li>
                <li>Puerta:  <input type="text" name="puerta" value="{!!$cliente->puerta!!}" /></li>
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
            <tbody>
          <td>
            <nav>
              <ul>
                <li>Codigo postal:  <input type="text" name="cod_postal" value="{!!$cliente->cod_postal!!}" size="30" /></li>
                <li>Población:  <input type="text" name="poblacion" value="{!!$cliente->poblacion!!}"  /></li>
                <li>Provincia:  <input type="text" name="provincia" value="{!!$cliente->provincia!!}" /></li>
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
