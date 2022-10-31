<x-app-layout>

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


</style>
<!-- content -->

<div class="wrapper row2">
  <form method="post" enctype="multipart/form-data" action="{{ url('/editfacturaguardar') }}" autocomplete="off" data-toogle="validator" role="form" id="logo_form">
    {{ csrf_field() }}
    <br>
    <h3>Materiales</h3>
    <table id="customers">
      <thead>
        <td>Denominación</td>
        <td>Cantidad</td>
        <td>Precio unidad</td> 
        <td>Importe</td> 
      </thead>
      <tbody>
<!--1-->
        <tr>
        @if($materiales1 == null)
          <td><input type="text" name="denominacion01" value="" /></td> 
          <td><input type="number" step=".01" name="cantidad01" value="" id="cantidad01" onchange="setTotal1();"/></td> 
          <td><input type="number" step=".01" name="preciounidad01" id="precio01" onchange="setTotal1();"/></td> 
          <td><input type="number" step=".01" name="importe01" value="" id="total01" /></td>
          <td><a href="#" id="showtabla2" class="button">+</a></td> 
        @else
          <td><input type="text" name="denominacion01" value="{!!$materiales1->nombre!!}" /></td> 
          <td><input type="number" step=".01" name="cantidad01" value="{!!$materiales1->cantidad!!}" id="cantidad01" onchange="setTotal1();"/></td> 
          <td><input type="number" step=".01" name="preciounidad01" value="{!!$materiales1->preciounidad!!}" id="precio01" onchange="setTotal1();"/></td> 
          <td><input type="number" step=".01" name="importe01" value="{!!$materiales1->importe!!}" id="total01" /></td>
          <input hidden type="text" name="materiales1" value="{!!$materiales1->id!!}" />
          <td><a href="#" id="showtabla2" class="button">+</a></td> 
        @endif
        </tr> 
<!--2-->
        @if($materiales2 == null)
        <tr id="tabla2" hidden> 
          <td><input type="text" name="denominacion02" value="" /></td> 
          <td><input type="number" step="any" name="cantidad02" value="" id="cantidad02" onchange="setTotal2();"/></td> 
          <td><input type="number" step="any" name="preciounidad02" id="precio02" onchange="setTotal2();"/></td> 
          <td><input type="number" step="any" name="importe02" value="" id="total02" /></td>
          <td><a href="#" id="showtabla3" class="button">+</a></td>
        @else
        <tr id="tabla2"> 
          <td><input type="text" name="denominacion02" value="{!!$materiales2->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad02" value="{!!$materiales2->cantidad!!}" id="cantidad02" onchange="setTotal2();"/></td> 
          <td><input type="number" step="any" name="preciounidad02" value="{!!$materiales2->preciounidad!!}" id="precio02" onchange="setTotal2();"/></td> 
          <td><input type="number" step="any" name="importe02" value="{!!$materiales2->importe!!}" id="total02" /></td>
          <input hidden type="text" name="materiales2" value="{!!$materiales2->id!!}" />
          <td><a href="#" id="showtabla3" class="button">+</a></td>
        @endif
        </tr>
<!--3-->
        @if($materiales3 == null)
        <tr id="tabla3" hidden> 
          <td><input type="text" name="denominacion03" value="" /></td> 
          <td><input type="number" step="any" name="cantidad03" value="" id="cantidad03" onchange="setTotal3();"/></td> 
          <td><input type="number" step="any" name="preciounidad03" id="precio03"onchange="setTotal3();"/></td> 
          <td><input type="number" step="any" name="importe03" value="" id="total03" /></td>
          <td><a href="#" id="showtabla4" class="button">+</a></td> 
        @else
        <tr id="tabla3"> 
          <td><input type="text" name="denominacion03" value="{!!$materiales3->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad03" value="{!!$materiales3->cantidad!!}" id="cantidad03" onchange="setTotal3();"/></td> 
          <td><input type="number" step="any" name="preciounidad03" value="{!!$materiales3->preciounidad!!}" id="precio03"onchange="setTotal3();"/></td> 
          <td><input type="number" step="any" name="importe03" value="{!!$materiales3->importe!!}" id="total03" /></td>
          <input hidden type="text" name="materiales3" value="{!!$materiales3->id!!}" />
          <td><a href="#" id="showtabla4" class="button">+</a></td> 
        @endif
        </tr>
<!--4-->
        @if($materiales4 == null)
        <tr id="tabla4" hidden> 
          <td><input type="text" name="denominacion04" value="" /></td> 
          <td><input type="number" step="any" name="cantidad04" value="" id="cantidad04" onchange="setTotal4();"/></td> 
          <td><input type="number" step="any" name="preciounidad04" id="precio04"onchange="setTotal4();"/></td> 
          <td><input type="number" step="any" name="importe04" value="" id="total04" /></td>
          <td><a href="#" id="showtabla5" class="button">+</a></td> 
        @else
        <tr id="tabla4"> 
          <td><input type="text" name="denominacion04" value="{!!$materiales4->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad04" value="{!!$materiales4->cantidad!!}" id="cantidad04" onchange="setTotal4();"/></td> 
          <td><input type="number" step="any" name="preciounidad04" value="{!!$materiales4->preciounidad!!}" id="precio04" onchange="setTotal4();"/></td> 
          <td><input type="number" step="any" name="importe04" value="{!!$materiales4->importe!!}" id="total04" /></td>
          <input hidden type="text" name="materiales4" value="{!!$materiales4->id!!}" />
          <td><a href="#" id="showtabla5" class="button">+</a></td> 
        @endif
        </tr>
<!--5-->
        @if($materiales5 == null)
        <tr id="tabla5" hidden> 
          <td><input type="text" name="denominacion05" value="" /></td> 
          <td><input type="number" step="any" name="cantidad05" value="" id="cantidad05" onchange="setTotal5();"/></td> 
          <td><input type="number" step="any" name="preciounidad05" id="precio05" onchange="setTotal5();"/></td> 
          <td><input type="number" step="any" name="importe05" value="" id="total05" /></td>
          <td><a href="#" id="showtabla6" class="button">+</a></td>
        @else
        <tr id="tabla5"> 
          <td><input type="text" name="denominacion05" value="{!!$materiales5->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad05" value="{!!$materiales5->cantidad!!}" id="cantidad05" onchange="setTotal5();"/></td> 
          <td><input type="number" step="any" name="preciounidad05" value="{!!$materiales5->preciounidad!!}" id="precio05" onchange="setTotal5();"/></td> 
          <td><input type="number" step="any" name="importe05" value="{!!$materiales5->importe!!}" id="total05" /></td>
          <input hidden type="text" name="materiales5" value="{!!$materiales5->id!!}" />
          <td><a href="#" id="showtabla6" class="button">+</a></td>
        @endif
        </tr>
<!--6-->
        @if($materiales6 == null)
        <tr id="tabla6" hidden> 
          <td><input type="text" name="denominacion06" value="" /></td> 
          <td><input type="number" step="any" name="cantidad06" value="" id="cantidad06" onchange="setTotal6();"/></td> 
          <td><input type="number" step="any" name="preciounidad06"  id="precio06" onchange="setTotal6();"/></td> 
          <td><input type="number" step="any" name="importe06" value="" id="total06" /></td>
          <td><a href="#" id="showtabla7" class="button">+</a></td>
        @else
        <tr id="tabla6"> 
          <td><input type="text" name="denominacion06" value="{!!$materiales6->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad06" value="{!!$materiales6->cantidad!!}" id="cantidad06" onchange="setTotal6();"/></td> 
          <td><input type="number" step="any" name="preciounidad06" value="{!!$materiales6->preciounidad!!}" id="precio06" onchange="setTotal6();"/></td> 
          <td><input type="number" step="any" name="importe06" value="{!!$materiales6->importe!!}" id="total06" /></td>
          <input hidden type="text" name="materiales6" value="{!!$materiales6->id!!}" />
          <td><a href="#" id="showtabla7" class="button">+</a></td>
        @endif
        </tr>
<!--7-->
        @if($materiales7 == null)
        <tr id="tabla7" hidden> 
          <td><input type="text" name="denominacion07" value="" /></td> 
          <td><input type="number" step="any" name="cantidad07" value="" id="cantidad07" onchange="setTotal7();"/></td> 
          <td><input type="number" step="any" name="preciounidad07" id="precio07" onchange="setTotal7();"/></td> 
          <td><input type="number" step="any" name="importe07" value="" id="total07" /></td>
          <td><a href="#" id="showtabla8" class="button">+</a></td>
        @else
        <tr id="tabla7"> 
          <td><input type="text" name="denominacion07" value="{!!$materiales7->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad07" value="{!!$materiales7->cantidad!!}" id="cantidad07" onchange="setTotal7();"/></td> 
          <td><input type="number" step="any" name="preciounidad07" value="{!!$materiales7->preciounidad!!}" id="precio07" onchange="setTotal7();"/></td> 
          <td><input type="number" step="any" name="importe07" value="{!!$materiales7->importe!!}" id="total07" /></td>
          <input hidden type="text" name="materiales7" value="{!!$materiales7->id!!}" />
          <td><a href="#" id="showtabla8" class="button">+</a></td>
        @endif
        </tr>
<!--8-->
        @if($materiales8 == null)
        <tr id="tabla8" hidden> 
          <td><input type="text" name="denominacion08" value="" /></td> 
          <td><input type="number" step="any" name="cantidad08" value="" id="cantidad08" onchange="setTotal8();"/></td> 
          <td><input type="number" step="any" name="preciounidad08"  id="precio08" onchange="setTotal8();"/></td> 
          <td><input type="number" step="any" name="importe08" value="" id="total08" /></td>
          <td><a href="#" id="showtabla9" class="button">+</a></td>
        @else
        <tr id="tabla8"> 
          <td><input type="text" name="denominacion08" value="{!!$materiales8->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad08" value="{!!$materiales8->cantidad!!}" id="cantidad08" onchange="setTotal8();"/></td> 
          <td><input type="number" step="any" name="preciounidad08" value="{!!$materiales8->preciounidad!!}" id="precio08" onchange="setTotal8();"/></td> 
          <td><input type="number" step="any" name="importe08" value="{!!$materiales8->importe!!}" id="total08" /></td>
          <input hidden type="text" name="materiales8" value="{!!$materiales8->id!!}" />
          <td><a href="#" id="showtabla9" class="button">+</a></td>
        @endif
        </tr>
<!--9-->
        @if($materiales9 == null)
        <tr id="tabla9" hidden> 
          <td><input type="text" name="denominacion09" value="" /></td> 
          <td><input type="number" step="any" name="cantidad09" value="" id="cantidad09" onchange="setTotal9();"/></td> 
          <td><input type="number" step="any" name="preciounidad09" value="" id="precio09" onchange="setTotal9();"/></td> 
          <td><input type="number" step="any" name="importe09" value="" id="total09" /></td>
          <td><a href="#" id="showtabla10" class="button">+</a></td>
        @else
        <tr id="tabla9"> 
          <td><input type="text" name="denominacion09" value="{!!$materiales9->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad09" value="{!!$materiales9->cantidad!!}" id="cantidad09" onchange="setTotal9();"/></td> 
          <td><input type="number" step="any" name="preciounidad09" value="{!!$materiales9->preciounidad!!}" id="precio09" onchange="setTotal9();"/></td> 
          <td><input type="number" step="any" name="importe09" value="{!!$materiales9->importe!!}" id="total09" /></td>
          <input hidden type="text" name="materiales9" value="{!!$materiales9->id!!}" />
          <td><a href="#" id="showtabla10" class="button">+</a></td>
        @endif
        </tr>
<!--10-->
        @if($materiales10 == null)
        <tr id="tabla10" hidden> 
          <td><input type="text" name="denominacion10" value="" /></td> 
          <td><input type="number" step="any" name="cantidad10" value="" id="cantidad10" onchange="setTotal10();"/></td> 
          <td><input type="number" step="any" name="preciounidad10" id="precio10" onchange="setTotal10();"/></td> 
          <td><input type="number" step="any" name="importe10" value="" id="total10" /></td>
        @else
        <tr id="tabla10"> 
          <td><input type="text" name="denominacion10" value="{!!$materiales10->nombre!!}" /></td> 
          <td><input type="number" step="any" name="cantidad10" value="{!!$materiales10->cantidad!!}" id="cantidad10" onchange="setTotal10();"/></td> 
          <td><input type="number" step="any" name="preciounidad10" value="{!!$materiales10->preciounidad!!}" id="precio10" onchange="setTotal10();"/></td> 
          <td><input type="number" step="any" name="importe10" value="{!!$materiales10->importe!!}" id="total10" /></td>
          <input hidden type="text" name="materiales10" value="{!!$materiales10->id!!}" />
        @endif
        </tr>
      </tbody>  
    </table>
    <input hidden type="text" name="factura_id" value="{!!$factura->id!!}" />





  </div>
<a href="{{ route('dashboard') }}" class="btn btn-primary button">Volver</a><button type="submit" class="btn btn-primary button" onclick="return confirm('continuar?');" style="float:right;">Guardar</button>
</form>
</div>
</div>
</div>
</x-app-layout>
<script type="text/javascript">

document.getElementById("showtabla2")
        .addEventListener("click", () => {
  document.getElementById("tabla2").hidden = false;
}, false);

document.getElementById("showtabla3")
        .addEventListener("click", () => {
  document.getElementById("tabla3").hidden = false;
}, false);

document.getElementById("showtabla4")
        .addEventListener("click", () => {
  document.getElementById("tabla4").hidden = false;
}, false);

        document.getElementById("showtabla5")
        .addEventListener("click", () => {
  document.getElementById("tabla5").hidden = false;
}, false);

        document.getElementById("showtabla6")
        .addEventListener("click", () => {
  document.getElementById("tabla6").hidden = false;
}, false);

        document.getElementById("showtabla7")
        .addEventListener("click", () => {
  document.getElementById("tabla7").hidden = false;
}, false);

        document.getElementById("showtabla8")
        .addEventListener("click", () => {
  document.getElementById("tabla8").hidden = false;
}, false);

        document.getElementById("showtabla9")
        .addEventListener("click", () => {
  document.getElementById("tabla9").hidden = false;
}, false);

        document.getElementById("showtabla10")
        .addEventListener("click", () => {
  document.getElementById("tabla10").hidden = false;
}, false);

function setTotal1() {
  var a = document.getElementById('cantidad01').value;
  var b = document.getElementById('precio01').value;
  var total = a*b;
  document.getElementById('total01').value = total.toFixed(2);
}
function setTotal2() {
  var a = document.getElementById('cantidad02').value;
  var b = document.getElementById('precio02').value;
  document.getElementById('total02').value = (a * b).toFixed(2);
} 
function setTotal3() {
  var a = document.getElementById('cantidad03').value;
  var b = document.getElementById('precio03').value;
  document.getElementById('total03').value = (a * b).toFixed(2)
} 
function setTotal4() {
  var a = document.getElementById('cantidad04').value;
  var b = document.getElementById('precio04').value;
  document.getElementById('total04').value = (a * b).toFixed(2)
} 
function setTotal5() {
  var a = document.getElementById('cantidad05').value;
  var b = document.getElementById('precio05').value;
  document.getElementById('total05').value = (a * b).toFixed(2)
} 
function setTotal6() {
  var a = document.getElementById('cantidad06').value;
  var b = document.getElementById('precio06').value;
  document.getElementById('total06').value = (a * b).toFixed(2)
} 
function setTotal7() {
  var a = document.getElementById('cantidad07').value;
  var b = document.getElementById('precio07').value;
  document.getElementById('total07').value = (a * b).toFixed(2)
} 
function setTotal8() {
  var a = document.getElementById('cantidad08').value;
  var b = document.getElementById('precio08').value;
  document.getElementById('total08').value = (a * b).toFixed(2)
} 
function setTotal9() {
  var a = document.getElementById('cantidad09').value;
  var b = document.getElementById('precio09').value;
  document.getElementById('total09').value = (a * b).toFixed(2)
} 
function setTotal10() {
  var a = document.getElementById('cantidad10').value;
  var b = document.getElementById('precio10').value;
  document.getElementById('total10').value = (a * b).toFixed(2)
} 

document.getElementById("total01").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla2").hidden = false;
    }
});
document.getElementById("total02").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla3").hidden = false;
    }
});
document.getElementById("total03").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla4").hidden = false;
    }
});
document.getElementById("total04").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla5").hidden = false;
    }
});
document.getElementById("total05").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla6").hidden = false;
    }
});
document.getElementById("total06").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla7").hidden = false;
    }
});
document.getElementById("total07").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla8").hidden = false;
    }
});
document.getElementById("total08").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla9").hidden = false;
    }
});
document.getElementById("total09").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
      document.getElementById("tabla10").hidden = false;
    }
});
document.getElementById("total10").addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
      event.preventDefault();
    }
});

document.addEventListener('keydown', function (event) {
  if (event.keyCode === 13 && event.target.nodeName === 'INPUT') {
    var form = event.target.form;
    var index = Array.prototype.indexOf.call(form, event.target);
    form.elements[index + 1].focus();
    event.preventDefault();
  }
});
</script>