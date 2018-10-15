<?php include '../extend/header.php'; ?>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Alta de clientes</span>
        <form class="form" action="ins_clientes.php" method="post" autocomplete=off >
          <div class="input-field">
            <input type="text" name="nombre"  title="Solo letras" pattern="[A-Z/s ]+"  id="nombre" onblur="may(this.value, this.id)"  >
            <label for="nombre">Nombre</label>
          </div>
          <div class="input-field">
            <input type="text" name="direccion"    id="direccion" onblur="may(this.value, this.id)"  >
            <label for="direccion">Dirección</label>
          </div>
          <div class="input-field">
            <input type="text" name="telefono"   id="telefono"  >
            <label for="telefono">Telefono</label>
          </div>
          <div class="input-field">
            <input type="email" name="correo"   id="correo"   >
            <label for="email">Correo</label>
          </div>
          <button type="submit" class="btn" >Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <nav class="brown lighten-3" >
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
if ($_SESSION['nivel']== 'ADMINISTRADOR') {
  $sel= $con->prepare("SELECT id, nombre, direccion, telefono, correo, asesor FROM clientes ");
}else {
  $sel = $con->prepare("SELECT id, nombre, direccion, telefono, correo, asesor FROM clientes  WHERE asesor = ? ");
  $sel->bind_param('s', $_SESSION['nombre']);
}
$sel -> execute();
$sel-> store_result();
$sel -> bind_result($id, $nombre, $direccion, $telefono, $correo, $asesor);
$row = $sel->num_rows;
 ?>
 <div class="row">
   <div class="col s12 ">
     <div class="card">
       <div class="card-content">
         <span class="card-title">Clientes(<?php echo $row?>)</span>
         <table>
           <thead>
             <tr class="cabecera">
               <th>Nombre</th>
               <th>Dirección</th>
               <th>Telefono</th>
               <th>Correo</th>
               <th>Asesor</th>
               <th>Nuevo</th>
               <th></th>
               <th></th>

             </tr>
           </thead>
           <?php while ($sel->fetch()) { ?>
            <tr>
              <td><?php echo $nombre ?></td>
              <td><?php echo $direccion ?></td>
              <td><?php echo $telefono ?></td>
              <td><?php echo $correo ?></td>
              <td><?php echo $asesor ?></td>
              <td> <a href="../propiedades/alta_propiedades.php?id=<?php echo $id ?>&nombre=<?php echo $nombre ?>" class="btn-floating green"> <i class="material-icons">add</i></a>
              </td>
              <td> <a href="editar_cliente.php?id=<?php echo $id ?>" class="btn-floating blue"> <i class="material-icons">loop</i></a>
              </td>
              <td>
                <a href="#" class="btn-floating red" onclick="swal({title: '¿Esta seguro que desea eliminar el cliente?',text: 'Al eliminarlo no podrá recuperarlo!',
                  type: 'warning',showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Eliminarlo!'
                }).then((result) => { if (result.value){location.href='eliminar_cliente.php?id=<?php echo $id ?>';}})"><i class="material-icons">clear</i></a>
              </td>


            </tr>
          <?php }
          $sel->close();
          $con->close();
           ?>
         </table>
       </div>
     </div>
   </div>
 </div>
<?php include '../extend/scripts.php'; ?>

</body>
</html>
