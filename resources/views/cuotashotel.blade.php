<!-- component -->
<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!--CONTENIDO-->
        <div class="mt-6 py-6 border-t border-slate-200 text-center">
          <h3>Selecciona Hotel al que ver las cuotas</h3>
        </div>

        <div class="max-w-2xl mx-auto">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="p-4">
            </div>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>


