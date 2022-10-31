<!-- component -->
  <x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!--CONTENIDO-->
        <form method="post" enctype="multipart/form-data" action="{{ url('/desgloseanno') }}" data-toogle="validator" role="form" id="logo_form" autocomplete="off">
          {{ csrf_field() }}


          <div class="form-group">
            <input type="text" name="anno" autocomplete="off" id="anno" class="form-control input-sm btn" placeholder="Año">
            <button type="submit" class="btn btn-primary button">Buscar</button>
          </div>


        </form>
desglose TOTAL de mano de obra en {!!$anno!!}:<h3 style="float:right; font-size: 50px;">{!!$sumatotal!!} euros</h3>

<div>
  <canvas id="myChart"></canvas>
</div>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Código
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Importe
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($manodeobras as $manodeobra)
                <tr class="bg-white border-b">
                  <td>{!!$manodeobra->factura->cod_factura!!}</td>
                  <td>{!!$manodeobra->importe!!}</td>
                </tr class="bg-white border-b">
                @endforeach
              </tbody>
            </table>

        <!--CONTENIDO-->
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
  const labels = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: '',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [{!!$enero!!},{!!$febrero!!},{!!$marzo!!},{!!$abril!!},{!!$mayo!!},{!!$junio!!},{!!$julio!!},{!!$agosto!!},{!!$septiembre!!},{!!$octubre!!},{!!$noviembre!!},{!!$diciembre!!}],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</x-app-layout>


