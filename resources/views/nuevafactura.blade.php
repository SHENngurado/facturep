<x-app-layout>
  <div class="py-8" style="color:black;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-3 py-2 elcentrador">
        <!--CONTENIDO-->
        
        <p>Insertar Nombre Hotel</p>

        <form method="post" enctype="multipart/form-data" action="{{ url('/nuevafacturarellena') }}" data-toogle="validator" autocomplete="off" role="form" id="logo_form">
          {{ csrf_field() }}


          <div class="form-group">
            <input type="text" name="hotel" id="hotel" class="form-control input-sm btn" placeholder="nombre hotel" required>
            <button type="submit" class="btn btn-primary button">Buscar</button>
          </div>


        </form>
        <!--fin de contenido-->
      </div>
    </div>
  </div>
</x-app-layout>
<script type="text/javascript">
  @if (session()->has('info'))
  alert("No se ha encontrado el hotel")
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
