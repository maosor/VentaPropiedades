<?php
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD']== 'POST'){
  foreach ($_POST as $campo => $valor) {
  $variable = "$".$campo."='".htmlentities($valor)."';";
  eval($variable);
  }
$id='';
$estatus= 'Activo';
$id_ejecutivo_agrego = $_SESSION['idEjecutivo'];
$ins = $con->prepare("INSERT INTO cliente (idCliente, Nombre, Telefono1, Telefono2, Telefono3, email, estatus,
 idEjecutivoAgrego, PresupuestoMaximo, idEjecutivoAsignado)
  SELECT MAX(idCliente)+1 ,?,?,?,?,?,?,?,?,? FROM cliente");
$ins -> bind_param('ssssssiii', $nombre, $telefono1, $telefono2, $telefono3, $email, $estatus,
 $id_ejecutivo_agrego, $presupuesto_maximo, $id_ejecutivo_asignado);
if ($ins -> execute()) {
  header('location:../extend/alerta.php?msj=Cliente registrado&c=cli&p=in&t=success');
}else {
  header('location:../extend/alerta.php?msj=El cliente no pudo ser registrado&c=cli&p=in&t=error');
}
$ins ->close();
$con->close();
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=cli&p=in&t=error');
}
 ?>
