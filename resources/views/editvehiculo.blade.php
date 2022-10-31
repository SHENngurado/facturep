<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-4">
        <div class="text-center mt-2 py-1">
          <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">vehiculo de {!!$vehiculo->cliente->nombre!!} {!!$vehiculo->cliente->apellido!!}</h3>
          <form method="post" autocomplete="off" enctype="multipart/form-data" action="{{ url('/editvehiculoguardar') }}" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <h1>EDITAR</h1>
            <table id="customers2">

              <tbody>
                <td>
                  <nav>
                    <ul>
                      <li>Matricula:  <input type="text" name="matricula" value="{!!$vehiculo->matricula!!}"  /></li>
                      <li>Marca:  <input type="text" name="marca" value="{!!$vehiculo->marca!!}" size="30"  /></li>
                      <li>Modelo:  <input type="text" name="modelo" value="{!!$vehiculo->modelo!!}" /></li>
                      <input hidden type="text" name="id" value="{!!$vehiculo->id!!}" />
                    </ul>
                  </nav>
                </td>
              </tr>
            </tbody>
          </table>
          <br>

        

        <button type="submit" class="btn btn-primary button">Guardar</button>
      </form>
      </div>
              <div class="text-center mt-2 py-8">
          <form method="post" enctype="multipart/form-data" action="{{ url('/editvehiculovincular') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">Vincular a cliente existente</h3>
            <br>
            <table id="customers2">

              <tbody>
                <td>
                  <nav>
                    <ul>
                      <li>CIF/DNI:  <input type="text" name="cifdni" value=""  /></li>
                      <input hidden type="text" name="id" value="{!!$vehiculo->id!!}" />
                    </ul>
                  </nav>
                </td>
              </tr>
            </tbody>
          </table>
          <br>

        

        <button type="submit" class="btn btn-primary button">Guardar</button>
      </form>
      </div>
       <div class="text-center mt-2 py-8">
          <form method="post" enctype="multipart/form-data" action="{{ url('/editvehiculonewclient') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">Vincular a Nuevo cliente</h3>
            <br>
                <table>
      <tbody>
        <tr>
          <td>
            <nav>
              <ul>
                <li><input type="text" name="nombre" value="" placeholder="Nombre" required/></li>
                <li><input type="text" name="apellido" value="" placeholder="Apellido" required/></li>
                <li><input type="text" name="dni" value="" placeholder="DNI" required/></li>
                <li><input type="text" name="telefono" value="" placeholder="Telefono" required/></li>
                <li><input type="text" name="correo" value="" placeholder="Correo" /></li>
              </ul>
            </nav>
          </td>
          <td>
            <nav>
              <ul>
                <li><input type="text" name="calle" value="" placeholder="Calle" /></li>
                <li><input type="text" name="portal" value="" placeholder="Portal" maxlength="4" size="4" /><input type="text" name="piso" value="" placeholder="Piso" maxlength="4" size="4" /><input type="text" name="puerta" value="" placeholder="Puerta" maxlength="4" size="4" /></li>
                <li><input type="text" name="cod_postal" value="" placeholder="Cod. Postal" /></li>
                <li><input type="text" name="poblacion" value="" placeholder="Poblacion" /><li>
                <li><input type="text" name="provincia" value="" placeholder="Provincia" /></li>
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
    </table>
          <br>

        
          <input hidden type="text" name="id" value="{!!$vehiculo->id!!}" />
        <button type="submit" class="btn btn-primary button">Guardar</button>
      </form>
      </div>

</div>
</div>
</div>
</x-app-layout>
<script type="text/javascript">
  @if (session()->has('info'))
  alert("No existe cliente con ese CIF/DNI")
  @endif


  $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>
