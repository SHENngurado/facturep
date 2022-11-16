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
            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
              Añadir Items
            </div>
            <br>
            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1"><a href="#" class="btn btn-primary button" id="myBtnporcentaje">%</a> <a href="#" class="btn btn-primary button" id="myBtncuota">Cuota</a> <a href="#" class="btn btn-primary button" id="myBtnimporte">Importe</a></h3>

          </div>
          <!-- component tabla-->
          <!-- This is an example component -->
          <div class="mt-6 py-6 border-t border-slate-200 text-center">
            <h3>items añadidos</h3>
          </div>
          <div class="max-w-2xl mx-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                      tipo
                    </th>
                    <th scope="col" class="px-6 py-3">
                      descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                      importe
                    </th>
                    <th scope="col" class="px-6 py-3">
                      borrar
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($items as $item)
                  <tr class="bg-white border-b">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {!!$item->nombre!!}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {!!$item->tipo!!}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {!!$item->descripcion!!}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {!!$item->importe!!}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      <a href="{{ url('/borraritem') }}/{!!$factura->id!!}/{!!$item->id!!}" class="btn btn-primary button" onclick="return confirm('seguro que desea borrar {!!$item->nombre!!}?');" style="color:red;" >X</a>
                    </td>
                  </tr class="bg-white border-b">
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- fin component tabla -->
            <br>
            <div class="elcentrador">
              <a href="{{ route('dashboard') }}" class="btn btn-primary button" onclick="return confirm('salir?');">Salir</a>
              <a href="{{ url('/verresumen') }}/{!!$factura->id!!}" class="btn btn-primary button" onclick="return confirm('ver resumen?');" >Ver resumen</a>
            </div>

        </div>
      </div>
    </x-app-layout>
    <!-- The Modal porcentaje -->
    <div id="myModalporcentaje" class="modal elcentrador">
      <div class="modal-content">
        <div class="modal-header">
          <span id="closeporcentaje" class="closeporcentaje">&times;</span>
          <h3>Añadiendo item tipo %</h3>
        </div>
        <div class="modal-body">
          <form  method="post" enctype="multipart/form-data" action="{{ url('/annadiritem') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <br>
            <table class="elcentrador">
              <tbody>
                <tr>
                  <td >
                    <nav>
                      <ul>
                        <li><input type="text" name="nombre" value="" placeholder="Nombre" required/></li>
                        <li><input type="number" step="any" name="porcentaje" onchange="setTotalporcentaje();" id="porcentaje" value="" placeholder="%" required/></li>
                        <li><input type="text" name="descripcion" value="" placeholder="descripcion" required/></li>
                        <li><input type="number"step="any" name="importeporcentaje" onchange="setTotalporcentaje();" id="importeporcentaje" value="" placeholder="importe sobre %" /></li>
                        <br>
                        <li>Total:</li>
                        <li><input type="text" readonly name="total" id="totalporcentaje" value="" placeholder="TOTAL" /></li>
                      </ul>
                    </nav>
                  </td>
                </tr>
              </tbody>
            </table>
            <br>
            <input type="text" name="tipo" value="Porcentaje" hidden />
            <input type="text" name="factura_id" value="{!!$factura->id!!}" hidden />
            <button type="submit" class="btn btn-primary button">Guardar</button>
          </form>
        </div>
      </div>

    </div>
    <!--  fin Modal porcentaje -->
    <!-- The Modal cuota -->
    <div id="myModalcuota" class="modal elcentrador">
      <div class="modal-content">
        <div class="modal-header">
          <span id="closecuota" class="closecuota">&times;</span>
          <h3>Añadiendo item tipo CUOTA</h3>
        </div>
        <div class="modal-body">
          <form  method="post" enctype="multipart/form-data" action="{{ url('/annadiritem') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <br>
            <table class="elcentrador">
              <tbody>
                <tr>
                  <td >
                    <nav>
                      <ul>
                        <li><select name="nombre" id="selectcuota" onchange="eligecuota()" required>>
                          <option disabled selected>Selecciona Cuota:</option>
                          @foreach($cuotas as $cuota)
                          <option value="{{$cuota->nombre}}" data-rate="{{$cuota->importe}}">{{$cuota->nombre}}</option>
                          @endforeach
                        </select></li>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <br>
                        <li><input type="text" name="descripcion" value="" placeholder="descripcion" required/></li>
                        <br>
                        <li>Total:</li>
                        <li><input type="text" readonly name="total" id="totalcuota" value="" placeholder="TOTAL" required/></li>
                      </ul>
                    </nav>
                  </td>
                </tr>
              </tbody>
            </table>
            <br>
            <input type="text" name="tipo" value="Cuota" hidden />
            <input type="text" name="factura_id" value="{!!$factura->id!!}" hidden />
            <button type="submit" class="btn btn-primary button">Guardar</button>
          </form>
          <br>
          <br>
          <div class="modal-footer">
          <form  method="post" enctype="multipart/form-data" action="{{ url('/annadircuota') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <table class="elcentrador">
              <h3>Añadir Cuota nueva al hotel</h3>
              <tbody>
                <tr>
                  <td >
                    <nav>
                      <ul>
                        <li><input type="text" style="color: black;" name="nombre" value="" placeholder="Nombre" required/></li>
                        <li><input type="text" style="color: black;" name="descripcion" value="" placeholder="Descripcion" required/></li>
                        <li><input type="number"step="any" style="color: black;" name="importe" value="" placeholder="importe" required/></li>
                      </ul>
                    </nav>
                  </td>
                </tr>
              </tbody>
            </table>

            <input type="text" name="factura_id" value="{!!$factura->id!!}" hidden />
            <button type="submit" class="btn btn-primary button">Guardar</button>
          </form>
          </div>
        </div>
      </div>

    </div>
    <!--  fin Modal porcentaje -->
    <!-- The Modal cuota -->
    <div id="myModalimporte" class="modal elcentrador">
      <div class="modal-content">
        <div class="modal-header">
          <span id="closeimporte" class="closeimporte">&times;</span>
          <h3>Añadiendo item tipo Importe</h3>
        </div>
        <div class="modal-body">
          <form  method="post" enctype="multipart/form-data" action="{{ url('/annadiritem') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
            {{ csrf_field() }}
            <br>
            <table class="elcentrador">
              <tbody>
                <tr>
                  <td >
                    <nav>
                      <ul>
                        <li><input type="text" name="nombre" value="" placeholder="Nombre" required/></li>
                        <li><input type="text" name="descripcion" value="" placeholder="Descripcion" required/></li>
                        <br>
                        <li>Total:</li>
                        <li><input type="number"step="any" name="total" value="" placeholder="Importe" /></li>
                      </ul>
                    </nav>
                  </td>
                </tr>
              </tbody>
            </table>
            <br>
            <input type="text" name="tipo" value="Importe" hidden />
            <input type="text" name="factura_id" value="{!!$factura->id!!}" hidden />
            <button type="submit" class="btn btn-primary button">Guardar</button>
          </form>
        </div>
      </div>

    </div>
    <!--  fin Modal porcentaje -->
    <script>
 // script de modal PORCENTAJE
// Get the modal
var modalporcentaje = document.getElementById("myModalporcentaje");

// Get the button that opens the modal
var btnporcentaje = document.getElementById("myBtnporcentaje");

// Get the <span> element that closes the modal
var spanporcentaje = document.getElementById("closeporcentaje");

// When the user clicks the button, open the modal 
btnporcentaje.onclick = function() {
  modalporcentaje.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanporcentaje.onclick = function() {
  modalporcentaje.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalporcentaje) {
    modalporcentaje.style.display = "none";
  }
}
// fin script modal PORCENTAJE
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
 // script de modal importe
// Get the modal
var modalimporte = document.getElementById("myModalimporte");

// Get the button that opens the modal
var btnimporte = document.getElementById("myBtnimporte");

// Get the <span> element that closes the modal
var spanimporte = document.getElementById("closeimporte");

// When the user clicks the button, open the modal 
btnimporte.onclick = function() {
  modalimporte.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanimporte.onclick = function() {
  modalimporte.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalimporte) {
    modalimporte.style.display = "none";
  }
}
// fin script modal importe
</script>
<script>
  function setTotalporcentaje() {
    var a = document.getElementById('porcentaje').value;
    var b = document.getElementById('importeporcentaje').value;
    document.getElementById('totalporcentaje').value = ((a * b)/100).toFixed(2);
  }
</script>
<script>


  $(document).ready(function () {     
    $('#selectcuota').change(function(){
      var color = $(this).find(":selected").data("rate")
      $('#totalcuota').val(color);
    })
  });
</script>