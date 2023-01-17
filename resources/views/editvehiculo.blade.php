<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-4">
        <div class="text-center mt-2 py-1 elcentrador">
          @if($hotel->cliente_id == "0")
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">Este hotel no pertenece a ningun grupo</h3>
          @else          
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">este Hotel pertenece a {!!$hotel->cliente->nombre!!}</h3>
          @endif
          <form method="post" autocomplete="off" enctype="multipart/form-data" action="{{ url('/editvehiculoguardar') }}" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <h1>EDITAR</h1>
            <table id="customers2" class="">

              <tbody>
                <td>
                  <nav>
                    <ul>
                      <li>Nombre:  <input  type="text" name="nombre" value="{!!$hotel->nombre!!}" /></li>
                      <li>Codigo:  <input  type="text" name="cod_hotel" value="{!!$hotel->cod_hotel!!}" /></li>
                      <li>cifdni:  <input type="text" name="cifdni" value="{!!$hotel->cifdni!!}" /></li>
                      <li>direccion:  <input  type="text" name="direccion" value="{!!$hotel->direccion!!}" /></li>
                      <li>cod_postal:  <input type="text" name="cod_postal" value="{!!$hotel->cod_postal!!}" /></li>
                      <li>correo:  <input type="text" name="correo" value="{!!$hotel->correo!!}" /></li>
                      <li>telefono:  <input type="text" name="telefono" value="{!!$hotel->telefono!!}" /></li>
                      <li>Nombre contacto:  <input type="text" name="contacto_nombre" value="{!!$hotel->contacto_nombre!!}" /></li>
                      <li>telefono contacto:  <input type="text" name="contacto_telefono" value="{!!$hotel->contacto_telefono!!}" /></li>
                      <li>correo contacto:  <input type="text" name="contacto_correo" value="{!!$hotel->contacto_correo!!}" /></li>
                      <input hidden type="text" name="id" value="{!!$hotel->id!!}" />
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
            <table id="customers2" class="elcentrador">

              <tbody>
                <td>
                  <nav>
                    <ul>
                      <li>CIF/DNI:  <input type="text" name="cifdni" value=""  /></li>
                      <input hidden type="text" name="id" value="{!!$hotel->id!!}" />
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
       <div class="text-center mt-2 py-8 elcentrador">
          <form method="post" enctype="multipart/form-data" action="{{ url('/editvehiculonewclient') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">Vincular a Nuevo cliente</h3>
            <br>
                <table class="elcentrador">
      <tbody>
              <tr>
                <td >
                  <nav>
                    <ul>
                      <li><input type="text" name="nombre" value="" placeholder="Nombre" required/></li>
                      <li><input type="text" name="cifdni" value="" placeholder="CIF/DNI" required/></li>
                      <li><input type="text" name="telefono" value="" placeholder="Telefono" required/></li>
                      <li><input type="text" name="correo" value="" placeholder="Correo" /></li>
                    <br>
                      <li><input type="text" name="direccion" value="" placeholder="direccion" /></li>
                      <li><input type="text" name="cod_postal" value="" placeholder="Cod. Postal y poblacion" /></li>
                    <br>
                      <li><input type="text" name="contacto_nombre" value="" placeholder="contacto_nombre" /></li>
                      <li><input type="text" name="contacto_correo" value="" placeholder="contacto_correo" /></li>
                      <li><input type="text" name="contacto_telefono" value="" placeholder="contacto_telefono" /></li>
                      </ul>
                    </nav>
                  </td>
                </tr>
              </tbody>
    </table>
          <br>

        
          <input hidden type="text" name="id" value="{!!$hotel->id!!}" />
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
