<?php
function Perfil_ejecutivo($id)
{
  include '../conexion/conexion.php';
  $sel = $con->prepare("SELECT descripcion FROM perfil_ejecutivo WHERE id = ? ");
  $sel->bind_param('i', $id);
  $sel->execute();
  $sel->bind_result($descripcion);
  if($sel->fetch()){
    return $descripcion;
  }
  else {
    return '';
  }
}
function tipo_ejecutivo($id)
{
  include '../conexion/conexion.php';
  $sel = $con->prepare("SELECT descripcion FROM tipo_ejecutivo WHERE id = ? ");
  $sel->bind_param('i', $id);
  $sel->execute();
  $sel->bind_result($descripcion);
  if($sel->fetch()){
    return $descripcion;
  }
  else {
    return '';
  }
}
function sucursal($id)
{
  include '../conexion/conexion.php';
  $sel = $con->prepare("SELECT nombre FROM sucursal WHERE id = ? ");
  $sel->bind_param('i', $id);
  $sel->execute();
  $sel->bind_result($nombre);
  if($sel->fetch()){
    return $nombre;
  }
  else {
    return '';
  }
}
 ?>
