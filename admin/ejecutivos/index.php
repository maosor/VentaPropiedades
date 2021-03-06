<?php include '../extend/header.php'; ?>

<div class="row">
  <div class="col s12">
    <nav class="blue lighten-4" >
      <div class="nav-wrapper">
        <div class="input-field">
          <input type="search"   id="buscar" autocomplete="off"  >
          <label for="buscar"><i class="material-icons" >search</i></label>
          <i class="material-icons" >close</i>
        </div>
      </div>
    </nav>
  </div>
</div>
<?php
$sel = $con->prepare("SELECT e.idEjecutivo,Nombre,Apellido1,Apellido2,email,p.descripcion,t.descripcion, TelefonoPrincipal
  FROM ejecutivo e INNER JOIN perfil p ON (e.idPerfil = p.idPerfil) INNER JOIN tipoejecutivo t ON(e.idTipo = t.idTipoEjecutivo) WHERE Borrado = 0 ");
$sel -> execute();
$sel-> store_result();
$sel -> bind_result($id, $nombre, $apellido1, $apellido2, $email, $perfil,$tipo,$telefono_principal );
$row = $sel->num_rows;
 ?>
 <div class="row">
   <div class="col s12 ">
     <div class="card">
       <div class="card-content">
         <span class="card-title">Ejecutivos (<?php echo $row?>)</span>
         <table id="tbldatos">
           <thead>
             <tr class="cabecera">
               <th>Nombre</th>
               <th>Email</th>
               <th>Perfil</th>
               <th>Tipo</th>
               <th>Telefono Principal</th>
               <th></th>
               <th></th>
               <th><a href="ingreso_ejecutivo.php" class="btn-floating green right"><i
                class="material-icons">add</i></a></th>

             </tr>
           </thead>
           <?php while ($sel->fetch()) { ?>
            <tr>
              <td><?php echo $nombre.' '. $apellido1.' '.$apellido2 ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $perfil ?></td>
              <td><?php echo $tipo ?></td>
              <td><?php echo $telefono_principal ?></td>

              <td> <a href="ingreso_ejecutivo.php?id=<?php echo $id ?>" class="btn-floating blue"> <i class="material-icons">edit</i></a>
              </td>
              <td>
                <a href="#" class="btn-floating red" onclick="swal({title: '¿Esta seguro que desea eliminar el ejecutivo?',text: 'Al eliminarlo no podrá recuperarlo!',
                  type: 'warning',showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Eliminarlo!'
                }).then((result) => { if (result.value){location.href='eliminar_ejecutivo.php?id=<?php echo $id ?>';}})"><i class="material-icons">clear</i></a>
              </td>


            </tr>
          <?php }
          $sel->close();
          $con->close();
           ?>
         </table>
         <span class="left" id="total_reg"></span>
        <ul class="pagination pager" id="myPager"></ul>
       </div>
     </div>
   </div>
 </div>

<?php include '../extend/scripts.php'; ?>
<?php include '../extend/paginacion.php'; ?>
<script type="text/javascript">
    $(document).ready(function(){
      paginar('#tbldatos',20)
    });
</script>

</body>
</html>
