<x-app-layout>
  <div class="py-8" style="color:black;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-3 py-2">
        <!--CONTENIDO-->
        
        <p>Comprobador de matriculas</p>

        <form method="post" enctype="multipart/form-data" action="{{ url('/nuevafacturarellena') }}" data-toogle="validator" autocomplete="off" role="form" id="logo_form">
          {{ csrf_field() }}


          <div class="form-group">
            <input type="text" name="matricula" id="matricula" class="form-control input-sm btn" placeholder="matricula" required>
            <button type="submit" class="btn btn-primary button">Buscar</button>
          </div>


        </form>
        <!--fin de contenido-->
      </div>
    </div>
  </div>
  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <!--CONTENIDO-->
        

        <style type="text/css">


          body{margin:0; padding:0; font-size:13px; font-family:Georgia, "Times New Roman", Times, serif; color:#FFFFFF; background-color:white;}

          .clear:after{content:"."; display:block; height:0; clear:both; visibility:hidden; line-height:0;}
          .clear{display:block; width:100%; clear:both;}
          html[xmlns] .clear{display:block;}
          * html .clear{height:1%;}

          a{outline:none; text-decoration:none;}

          code{font-weight:normal; font-style:normal; font-family:Georgia, "Times New Roman", Times, serif;}

          .fl_left{float:left;}
          .fl_right{float:right;}

          img{margin:0; padding:0; border:none; line-height:normal; vertical-align:middle;}
          .imgholder, .imgl, .imgr{padding:4px; border:1px solid #D6D6D6; text-align:center;}
          .imgl{float:left; margin:0 15px 15px 0; clear:left;}
          .imgr{float:right; margin:0 0 15px 15px; clear:right;}

/*----------------------------------------------HTML 5 Overrides-------------------------------------*/

address, article, aside, figcaption, figure, footer, header, nav, section{display:block; margin:0; padding:0;}

q{display:block; padding:0 10px 8px 10px; color:#979797; background-color:#ECECEC; font-style:italic; line-height:normal;}
q:before{content:'“ '; font-size:26px;}
q:after{content:' „'; font-size:26px; line-height:0;}

/* ----------------------------------------------Wrapper-------------------------------------*/

div.wrapper{display:block; width:100%; margin:0; padding:0; text-align:left;}

.row1, .row1 a{color:#C0BAB6; background-color:#333333;}
.row2{color:#979797; background-color:#FFFFFF;}
.row2 a{color:#FF9900; background-color:#FFFFFF;}
.row3, .row3 a{color:#FFFFFF; background-color:#1E1E1E;}

/*----------------------------------------------Generalise-------------------------------------*/

#header, #container, #footer{display:block; margin:0 auto; width:960px;}

nav ul{margin:0; padding:0; list-style:none;}

h1, h2, h3, h4, h5, h6{margin:0; padding:0; font-size:20px; font-weight:normal; font-style:normal; line-height:normal;}

/*----------------------------------------------Header-------------------------------------*/

#header, #header a{color:#C0BAB6; background-color:#333333;}

#header #hgroup{float:left; padding:20px 0;}
#header #hgroup h1, #header #hgroup h2{}
#header #hgroup h1{font-size:36px;}
#header #hgroup h2{font-size:13px;}

#header nav{float:right; padding:20px 0;}
#header nav ul{margin-top:20px;}
#header nav li{display:inline; margin-right:15px; text-transform:uppercase;}
#header nav li.last{margin-right:0;}
#header nav a{color:#C0BAB6; background-color:#333333;}

/*----------------------------------------------Content Area-------------------------------------*/

#container{padding:30px 0;}
#container section{margin:0 0 30px 0;}
#container section.last{margin:0;}
#container .more{text-align:right; text-transform:uppercase; font-size:smaller; font-weight:bold;}

/* ------Left Column-----*/

#container #left_column{float:left; width:280px;}
#container #left_column h2.title{margin-bottom:20px;}

#container #left_column nav{display:block; width:100%; margin-bottom:30px;}
#container #left_column nav ul{margin:0; padding:0; list-style:none;}
#container #left_column nav li{margin:0 0 3px 0; padding:0;}
#container #left_column nav li.last{margin-bottom:0;}
#container #left_column nav a{display:block; margin:0; padding:5px 10px 5px 20px; color:#666666; background:url("../images/orange_file.gif") no-repeat 10px center #FFFFFF; text-decoration:none; border-bottom:1px dotted #666666;}

/* ------Main Content-----*/

#container #content{float:right; width:630px;}

#container #content section article{}
#container #content section article h2{text-transform:uppercase;}
#container #content section article address{font-size:10px; font-style:normal;}
#container #content section article time{font-size:10px;}
#container #content section article .tags{display:block; padding:5px; color:#979797; background-color:#ECECEC; font-style:italic;}
#container #content section article .tags a{color:#FF9900; background-color:#ECECEC;}

#container #content #services{}
#container #content #services ul{margin:0; padding:0; list-style:none;}
#container #content #services ul li{display:block; width:300px;}
#container #content #services ul li.odd{float:left;}
#container #content #services ul li.even{float:right;}
#container #content #services ul li img{width:290px; height:100px; margin:0 0 15px 0; padding:4px; border:1px solid #666666;}

/*----------------------------------------------Footer-------------------------------------*/

#footer{}
#footer p{margin:0; padding:20px 0;}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color: black;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}


#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:;
  color: grey;
}
#customers2 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color: black;
}

#customers2 td, #customers2 th {
  padding: 8px;
}

#customers2 tr:nth-child(even){background-color: #f2f2f2;}


#customers2 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:;
  color: black;
}
#customers3 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color: black;
}

#customers3 td, #customers3 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers3 tr:nth-child(even){background-color: #f2f2f2;}


#customers3 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:;
  color: grey;
}

</style>
<!-- content -->
<div class="wrapper row2">
  <form method="post" enctype="multipart/form-data" action="{{ url('/crearfactura') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
    {{ csrf_field() }}
    <table id="customers2">
      <tbody>
        <tr>

          <td>
            <br>
            <br>
            <nav>
              <ul>
                <li><input type="text" name="matricula" value="" placeholder="matricula" required/></li>
                <li><input type="text" name="marca" value="" placeholder="marca" /></li>
                <li><input type="text" name="modelo" value="" placeholder="modelo" /></li>
                <li><input type="number" name="kms" value="" placeholder="kilometros" required/></li>
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <table id="customers2">
      <tbody>
        <tr>
          <td>
            <nav>
              <ul>
                <li><input type="text" name="nombre" value="" placeholder="Nombre" size="10" required/><input type="text" name="apellido" value="" placeholder="Apellido" size="10" required/></li>
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
                <li><input type="text" name="portal" value="" placeholder="Portal" maxlength="4" size="2" /><input type="text" name="piso" value="" placeholder="Piso" maxlength="4" size="2" /><input type="text" name="puerta" value="" placeholder="Puerta" maxlength="4" size="2" /></li>
                <li><input type="text" name="cod_postal" value="" placeholder="Cod. Postal" size="7" /><input type="text" name="poblacion" value="" placeholder="Poblacion" size="7" /></li>
                <li><input type="text" name="provincia" value="" placeholder="Provincia" /></li>
              </ul>
            </nav>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
 </div>

        <a href="{{ route('dashboard') }}" class="btn btn-primary button">Volver</a><button type="submit" class="btn btn-primary button" style="float:right;">Añadir mano de obra</button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
<script type="text/javascript">
  @if (session()->has('info'))
  alert("No se ha encontrado la matricula")
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
