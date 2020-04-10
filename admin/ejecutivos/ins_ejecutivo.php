<?php
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD']== 'POST'){
  foreach ($_POST as $campo => $valor) {
  $variable = "$".$campo."='".htmlentities($valor)."';";
  eval($variable);
  }
$id=''; //Generar nuemero consecutivo
$activo = 1;
$borrado = 0;
$foto = 'foto_perfil/perfil.png'; 
$pass1 = sha1($pass1);
$ins = $con->prepare("INSERT INTO ejecutivo (idEjecutivo, Nombre, Apellido1, Apellido2, email, password,Activo, idPerfil,idTipo, TelefonoPrincipal, TelefonoSecundario, TelefonoCelular, Borrado, idSucursal, foto)  SELECT MAX(idEjecutivo)+1, ?,?,?,?,?,?,?,?,?,?,?,?,?,? FROM ejecutivo");
$ins -> bind_param('sssssiiisssiis', $nombre, $apellido1, $apellido2, $email, $pass1,
   $activo, $id_perfil, $id_tipo, $telefono_principal, $telefono_secundario, $telefono_celular, $borrado,
   $id_sucursal,$foto);
if ($ins -> execute()) {
  header('location:../extend/alerta.php?msj=Ejecutivo registrado&c=eje&p=in&t=success');
}else {
  header('location:../extend/alerta.php?msj=El ejecutivo no pudo ser registrado&c=eje&p=in&t=error');
}
$ins ->close();
$con->close();
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=eje&p=in&t=error');
}
 ?>
