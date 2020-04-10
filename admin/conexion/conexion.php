<?php @session_start();
  $con = new mysqli('localhost', 'root', '', 'inhauscr_propiedades');
  $con->set_charset('utf8');
  if (mysqli_connect_errno()) {
  printf("Falló la conexión: %s\n", mysqli_connect_error());
  exit();
}
 ?>
