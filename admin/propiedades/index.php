<?php include '../extend/header.php';?>
  <style media="screen">
    html{
      font-family: "Roboto", sans-serif !important;
    }
    input[type="text"]:not(.browser-default){
      background-color: #fff;
      background-image: none;
      border: 1px solid #ccc;
      border-radius: 4px;
      height: 34px;
      font-size: 14px;
      margin: 0 5px 0 0;
    }
    input[type="text"]:not(.browser-default):focus:not([readonly]){
      border-color: #66afe9;
      outline: 0;
      box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
      }
    .btn-floating i
    {
      font-size: 1.1rem;
    }
    [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
    	position: unset;
    	opacity: unset;
    	pointer-events: none;
    }
  </style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


   <div class="table-responsive">
     <div class="">
       <a type='button'  href='ingreso_propiedad.php' class='btn-floating green col s4 right'><i class='material-icons'>add</i></a>
     </div>
    <table id="propiedadGrid" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th data-column-id="foto" data-formatter="foto" data-sortable="false">Foto</th>
       <th data-column-id="seg" data-formatter="seg" data-sortable="false"></th>
       <th data-column-id="idPropiedad" data-type="numeric">ID</th>
       <th data-column-id="Titulo">Titulo</th>
       <th data-column-id="Tipo">Tipo</th>
       <th data-column-id="TotalHabitaciones">Hab</th>
       <th data-column-id="nombreProvincia">Provincia</th>
       <th data-column-id="nombreDistrito">Distrito</th>
       <th data-column-id="PrecioAlquier">Alquiler</th>
       <th data-column-id="FechaIngreso">Fecha</th>
       <th data-column-id="nombreEjecutivo">Ejecutivo</th>
       <th data-column-id="commands" data-formatter="commands" data-sortable="false"></th>
      </tr>
     </thead>
    </table>
   </div>
<?php 	include 'filtros.php';
	if(isset($_GET["idContacto"]))	{ $idContacto = $_GET["idContacto"]; }	else {	$idContacto = '""'; }
?>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 var propiedadGrid = $('#propiedadGrid').bootgrid({
  ajax: true,
  rowSelect: true,
  post: function()
  {
   return{
    id: "data-propiedad",
  	finicial	: $('#FechaInicio').data().date,
  	ffinal	: $('#FechaFinal').data().date,
  	paramId	: $('#ID').val(),
  	paramIdAntiguo	: $('#ID_Antiguo').val(),
  	paramTitulo	: $('#Titulo').val(),
  	paramRotulo	: $('#Rotulo').val(),
  	paramCiudad	: $('#Cuidad').val(),
  	paramBarrio	: $('#Barrio').val(),
  	paramProvincia	: $('#provincia').val(),
  	paramCanton	: $('#canton').val(),
  	paramDistrito	: $('#distrito').val(),
  	paramTipo	: $('#Tipo').val(),
  	paramSubTipo	: $('#SubTipo').val(),
  	paramContacto	: <?php echo $idContacto ?>,
  	paramEjecutivo	: $('#Ejecutivo').val(),
  	paramPrecioVentaInic	: $('#precio_de').val(), //hasta 5 000 000
  	paramPrecioVentaFin	: $('#precio_a').val(), //hasta 5 000 000
  	paramPrecioAlquilerInic	: $('#Alquiler_de').val(), // 0/1000
  	paramPrecioAlquilerFin	: $('#Alquiler_a').val(), // 2000/0
  	paramAreaConstruccionInic	: $('#Area_de').val(),
  	paramAreaConstruccionFin	: $('#Area_a').val(),
  	paramTamanoLoteInic	: $('#Tamano_de').val(),
  	paramTamanoLoteFin	: $('#Tamano_a').val(),
  	paramDormitorios	: $('#Dormitorios').val(),
  	paramGaraje		: $('#Garaje').val(),
    otros: $('#strOtros').val()
   };
  },
  searchSettings: {
	delay: 100,
	characters: 3
  },
  url: "../extend/fetch.php",
  formatters: {
   "commands": function(column, row)
   {
	   var strComandos =  "<a type='button' class='btn-floating blue update' data-row-id='"+row.idPropiedad+"'><i class='material-icons'>edit</i></a>" +
							"&nbsp; <a type='button' class='btn-floating red delete' data-row-id='"+row.idPropiedad+"'><i class='material-icons'>clear</i></a>" ;
	   return strComandos;
   },
   "foto": function(column, row)
   {
     return "<a target='_blank' href='detalle_propiedad.php?id="+row.idPropiedad+"'><img class='materialboxed' width='60' src='../fotos/"+row.idPropiedad+"/thumb.jpg'></a>";

   },
   "seg": function (column, row) {
     return "<a type='button' class='btn-floating pink darken-4 comentario' data-row-id='"+row.idPropiedad+"'><i class='material-icons'>insert_comment</i></a>";
   }

 }
 });

 $('.bootgrid-header .search').css('width','400px');
 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  propiedadGrid.find(".comentario").on("click", function(event)
  {
   var idCliente = $(this).data("row-id");
   alert('Comentario de cliente #'+idCliente);
  });
 });

 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  propiedadGrid.find(".update").on("click", function(event)
  {
   var idCliente = $(this).data("row-id");
   //alert('Edición de cliente #'+idCliente);
     window.location.href = "ingreso_cliente.php?id="+idCliente;
  });
 });

 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  propiedadGrid.find(".delete").on("click", function(event)
  {
   if(confirm("¿Esta seguro de borrar el cliente?"))
   {
     var idCliente = $(this).data("row-id");
     window.location.href = "eliminar_cliente.php?id="+idCliente;
   }
   else{
    return false;
   }
  });
 });
});
$('#filtro').click(function(){
$.each($("input[name='otros']:checked"), function(){
  $('#strOtros').val($('#strOtros').val()+','+$(this).val());
});
$('#strOtros').val($('#strOtros').val().substring(1,$('#strOtros').val().length));
$('#propiedadGrid').bootgrid('reload');
})
</script>
<script type="text/javascript">
    $(function () {
        $('#finicial').datetimepicker({
          format: 'L',
        });
        $('#ffinal').datetimepicker({
            format: 'L',
            useCurrent: false //Important! See issue #1075
        });
        $("#finicial").on("dp.change", function (e) {
            $('#ffinal').data("DateTimePicker").minDate(e.date);
        });
        $("#ffinal").on("dp.change", function (e) {
            $('#finicial').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
