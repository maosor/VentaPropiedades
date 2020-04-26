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
      font-size: 1.6rem;
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
     <div class="row">
       <div class="col s2 ">
         <b class="right">Rango Fecha Desde</b>
       </div>
       <div class='col s3'>
           <div class="form-group">
              <div class='input-group date' id='finicial'>
                   <input type='text' class="form-control" />
                   <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                   </span>
               </div>
           </div>
       </div>
       <div class="col s1 ">
         <b class="right">Hasta</b>
       </div>
       <div class='col s3'>
           <div class="form-group">
               <div class='input-group date' id='ffinal'>
                 <input type='text' class="form-control" />
                   <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                   </span>
               </div>
           </div>
       </div>
       <div class="col s2">
         <a id="filtro" class="btn light-blue darken-4"><i class='material-icons'>filter_list</i></a>
       </div>
       <div class="col s1">

       </div>
     </div>
     <div class="">
       <a type='button'  href='ingreso_cliente.php' class='btn-floating green col s4 right'><i class='material-icons'>add</i></a>
     </div>
    <table id="clienteGrid" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th data-column-id="idCliente" data-type="numeric">ID</th>
       <th data-column-id="FechaIngreso">Fecha</th>
       <th data-column-id="Nombre">Nombre</th>
       <th data-column-id="Telefono1">Telefono1</th>
       <th data-column-id="Telefono2">Telefono2</th>
       <th data-column-id="nombreEjecutivo">Ejecutivo</th>
       <th data-column-id="email">Email</th>
       <th data-column-id="Estatus">Estatus</th>

       <th data-column-id="commands" data-formatter="commands" data-sortable="false"></th>
      </tr>
     </thead>
    </table>
   </div>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 var clienteGrid = $('#clienteGrid').bootgrid({
  ajax: true,
  rowSelect: true,
  post: function()
  {
   return{
    id: "data-cliente",
    finicial: $('#finicial').data().date,
    ffinal: $('#ffinal').data().date
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
	   var strComandos =  "<a type='button' class='btn-floating pink darken-4 comentario' data-row-id='"+row.idCliente+"'><i class='material-icons'>insert_comment</i></a>" +
     "&nbsp; <a type='button' class='btn-floating blue update' data-row-id='"+row.idCliente+"'><i class='material-icons'>edit</i></a>" +
							"&nbsp; <a type='button' class='btn-floating red delete' data-row-id='"+row.idCliente+"'><i class='material-icons'>clear</i></a>" ;
	   return strComandos;
   }
  }
 });

 $('.bootgrid-header .search').css('width','400px');
 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  clienteGrid.find(".comentario").on("click", function(event)
  {
   var idCliente = $(this).data("row-id");
   alert('Comentario de cliente #'+idCliente);
  });
 });

 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  clienteGrid.find(".update").on("click", function(event)
  {
   var idCliente = $(this).data("row-id");
   //alert('Edición de cliente #'+idCliente);
     window.location.href = "ingreso_cliente.php?id="+idCliente;
  });
 });

 $(document).on("loaded.rs.jquery.bootgrid", function()
 {
  clienteGrid.find(".delete").on("click", function(event)
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
  $('#clienteGrid').bootgrid('reload');
})
</script>
<script type="text/javascript">
    $(function () {
        $('#finicial').datetimepicker({
          format: 'YYYY-MM-DD'
        });
        $('#ffinal').datetimepicker({
          format: 'YYYY-MM-DD',
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
<script src="../js/materialize.min.js"></script>
