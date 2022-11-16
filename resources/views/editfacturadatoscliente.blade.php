<x-app-layout>
  
  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!--CONTENIDO-->
        

<!-- content -->
<div class="wrapper row2">
  <form method="post" enctype="multipart/form-data" action="{{ url('/editarproformaitems') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
    {{ csrf_field() }}
    <div class="text-center mt-2">
                        <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{!!$hotel->nombre!!}</h3>
                        <h5 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{!!$hotel->direccion!!} {!!$hotel->cod_postal!!}</h5>
                        <h5 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{!!$hotel->telefono!!} {!!$hotel->correo!!}</h5>
                        <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                            <a href="{{ url('/infocliente') }}/{!!$hotel->cliente->id!!}">{!!$hotel->cliente->nombre!!}</a>
                        </div>
                        <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                            {!!$hotel->cliente->telefono!!}  -  {!!$hotel->cliente->correo!!}
                        </div>
                        <input type="" hidden name="id" value="{!!$hotel->id!!}">
                        <input type="" hidden name="factura_id" value="{!!$factura->id!!}">
                    </div>
    <br>
 </div>

        <a href="{{ route('nuevafactura') }}" class="btn btn-primary button">Volver</a><button type="submit" class="btn btn-primary button" style="float:right;">Editar items</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>