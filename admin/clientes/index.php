<?php include '../extend/header.php'; ?>
  <style media="screen">
    .btn-floating i
    {
      font-size: 1.6rem;
    }

  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>

   <div class="table-responsive">
     <a type='button'  href="ingreso_cliente.php" class='btn-floating green right'><i class='material-icons'>add</i></a>
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
    id: "data-cliente"
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
							"&nbsp; <a type='button' class='btn-floating red delete' data-row-id='"+row.idCliente+"'><i class='material-icons'>clear</i></a>";
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
     alert('Borrar de cliente #'+idCliente);
   }
   else{
    return false;
   }
  });
 });
});
</script>
