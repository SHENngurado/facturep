<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Proforma</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css">
  <style type="text/css">
    nav ul{margin:0; padding:0; list-style:none;}


#customers {
  font-family: Times new roman, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color: black;
}

#customers td, #customers th {
  border: collapse;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:;
  color: grey;
}
#customers2 {
  border-collapse: collapse;
  width: 100%;
  color: black;
}

#customers2 td, #customers2 th {
  padding: 8px;
}

#customers2 tr:nth-child(even){background-color: #f2f2f2;}

#customers2 tr:hover {background-color: #ddd;}

#customers2 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:;
  color: black;
}
.fondo {
  background-image: url("img/fondo.png");
} 
.module {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 20px;
}

.borderlist {
    list-style-position:inside;
    border-bottom: 1px solid grey;
    padding-left: 20px;
}
</style>
</head>
<body>

  <!-- content -->
  <div class="">
    <h2 class="title" style="font-weight: bold; color: black; text-align: center;">FACTURA</h2>

    <div class="module" style="color: black; vertical-align: text-top;">
    <table id="customers2">
      <tbody>
        <tr>
          <td>
            <nav>
              <ul>
                <li><h2 class="title"><p style="font-weight: bold;">FECHA</p></li>
                <li>{!!$factura->created_at->format('d-m-Y')!!}</li>
              </ul>
            </nav>
          </td>
          <td>
            <nav style="text-align: left;">
              <ul>
                <li><h2 class="title"><p style="font-weight: bold;">N.º DE FACTURA</p></li>
                <li>{!!$factura->cod_factura!!}</li>
              </ul>
            </nav>
          </td>
          <td>
            <nav style="text-align: right;">
              <ul>
                <li><h2 class="title"><p style="font-weight: bold;">{!!$datos->nombre!!}</p></li>
                <li>{!!$datos->direccion!!}</li>
                <li>{!!$datos->cod_postal!!}</li>
                <li>{!!$datos->telefono!!}</li>
                <li>{!!$datos->cifdni!!}</li>
                <li>{!!$datos->correo!!}</li>
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
    </table>
        <table id="customers2">
      <tbody>
        <tr>
          <td>
            <nav>
              <ul>
                <li><h2 class="title"><p style="font-weight: bold;">{!!$factura->vehiculo->nombre!!}</h2></li>
                <li>{!!$factura->vehiculo->cifdni!!}</li>
                <li>{!!$factura->vehiculo->direccion!!}</li>
                <li>{!!$factura->vehiculo->cod_postal!!}</li>
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
    </table>
    </div>
    <br>
    <br>
    <br>
    <br>
    <table id="customers2" class="">
      <thead class="borderlist">
        <tr style="color:green;">
          <th>CONCEPTE</th>
          <th>DATES</th>
          <th>IMPORT</th>
        </tr>
      </thead>
      <tbody>
        @foreach($factura->manodeobras as $manodeobra)
        <tr>
          <td>{!!$manodeobra->nombre!!}</td>
          <td>{!!$manodeobra->descripcion!!}</td>
          <td>{!!$manodeobra->importe!!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <br>
    <!-- TOTAL -->
    <div class="module" style="float: right;">
    <table id="customers">
      <td>
        <nav>
              <ul>
                <li>Subtotal</li>
                <li>IVA {!!$factura->iva!!}%</li>
                <li>IRPF -{!!$factura->irpf!!}%</li>
                <br>
                <li style="font-weight:bold;">TOTAL</li>
              </ul>
            </nav>
          </td>
          <td>
      <nav style="text-align:right;">
        <ul>
          <li class="borderlist">   {!!$importetotal!!} €</li>
          <li class="borderlist">   {!!$iva!!} €</li>
          <li class="borderlist">   -{!!$cantidadirpf!!} €</li>
          <br>
          <li style="font-weight:bold;">{!!$importetotalivairpf!!} €</li>
        </ul>
      </nav>
    </td>
    </table>
    </div>
    </div>
      </div>
  </div>

</body>
</html>
