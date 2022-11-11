<!-- component -->
<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!--CONTENIDO-->

         <form  method="post" enctype="multipart/form-data" action="{{ url('/vercuotasdehotel') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
              {{ csrf_field() }}
              <br>
              <table class="elcentrador">
                <tbody>
                  <tr>
                    <td >
                      <nav>
                        <ul>
                          <li><select name="id" required onchange="this.form.submit()">
                            <option disabled selected>Selecciona hotel:</option>
                            @foreach($hoteles as $hotel)
                            <option value="{{$hotel->id}}">{{$hotel->nombre}}</option>
                            @endforeach
                          </select></li>
                        </ul>
                      </nav>
                    </td>
                  </tr>
                </tbody>
              </table>
              <br>
            </form>
        <!--fin de contenido-->
        <!-- component -->
        <!-- This is an example component -->
        <div class="mt-6 py-6 border-t border-slate-200 text-center">
          <h3>Cuotas de {{$hotelseleccionado->nombre}}</h3>
          <a href="#" class="btn btn-primary button" id="myBtncuota">Nueva</a> 
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
                    Descripción
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Import
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Borrar
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($cuotas as $cuota)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{!!$cuota->nombre!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{!!$cuota->descripcion!!}</td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <form  method="post" enctype="multipart/form-data" action="{{ url('/editcuota') }}" autocomplete="off" data-toogle="validator" role="form">
                      {{ csrf_field() }}
                      <input type="number"step="any" size="20" name="importcuota" value="{!!$cuota->importe!!}" placeholder="Importe" />
                      <input type="text" name="cuota_id" value="{!!$cuota->id!!}" hidden />
                      <input type="text" name="hotel_id" value="{!!$hotelseleccionado->id!!}" hidden />

                      <button type="submit" class="btn btn-primary button">Guardar</button>
                    </form></td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap"><a href="{{ url('/borrarcuota') }}/{!!$hotelseleccionado->id!!}/{!!$cuota->id!!}" class="button" style="color: red;">Borrar</a></td>
                </tr class="bg-white border-b">
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
      <!-- The Modal cuota -->
    <div id="myModalcuota" class="modal elcentrador">
      <div class="modal-content">
        <div class="modal-header">
          <span id="closecuota" class="closecuota">&times;</span>
        </div>
        <div class="modal-body">
          <div class="modal-body">
          <form  method="post" enctype="multipart/form-data" action="{{ url('/annadircuotanormal') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <table class="elcentrador">
              <h3>Añadir Cuota nueva al hotel</h3>
              <tbody>
                <tr>
                  <td >
                    <nav>
                      <ul>
                        <li><input type="text" name="nombre" value="" placeholder="Nombre" required/></li>
                        <li><input type="text" name="descripcion" value="" placeholder="Descripcion" required/></li>
                        <li><input type="text" name="importe" value="" placeholder="importe" required/></li>
                      </ul>
                    </nav>
                  </td>
                </tr>
              </tbody>
            </table>

            <input type="text" name="hotel_id" value="{!!$hotelseleccionado->id!!}" hidden />
            <button type="submit" class="btn btn-primary button">Guardar</button>
          </form>
          </div>
        </div>
      </div>

    </div>
    <!--  fin Modal cuota -->
</x-app-layout>

<script type="text/javascript">
// script de modal CUOTA
// Get the modal
var modalcuota = document.getElementById("myModalcuota");

// Get the button that opens the modal
var btncuota = document.getElementById("myBtncuota");

// Get the <span> element that closes the modal
var spancuota = document.getElementById("closecuota");

// When the user clicks the button, open the modal 
btncuota.onclick = function() {
  modalcuota.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spancuota.onclick = function() {
  modalcuota.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalcuota) {
    modalcuota.style.display = "none";
  }
}
// fin script modal CUOTA
</script>