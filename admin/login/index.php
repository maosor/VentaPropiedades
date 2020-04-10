<?php
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD']== 'POST'){
  $user = $con->real_escape_string(htmlentities($_POST['usuario']));
  $pass = $con->real_escape_string(htmlentities($_POST['contra']));
  $candado = ' ';
  $str_u = strpos($user, $candado);
  $str_p = strpos($pass, $candado);
  if (is_int($str_u)){
    $user = '';
  }else {
    $usuario = $user;
  }
  if (is_int($str_p)){
    $pass = '';
  }else {
    $pass2 = sha1($pass);
  }
  if ($user == null && $pass == null) {
    header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
  }else {
    $sel = $con->query("SELECT idEjecutivo, Nombre, Apellido1, Apellido2, email, password, idPerfil, idTipo, idSucursal, foto
      FROM ejecutivo WHERE Borrado= 0 AND Activo = 1 AND email = '$usuario' AND password = '$pass2' ");
       $row = mysqli_num_rows($sel);
       if ($row == 1) {
         if ($var = $sel->fetch_assoc()) {
            $id = $var['idEjecutivo'];
            $nombre = $var['Nombre'];
            $apellido1 = $var['Apellido1'];
            $apellido2 = $var['Apellido2'];
            $password = $var['password'];
            $email = $var['email'];
            $id_perfil = $var['idPerfil'];
            $id_tipo = $var['idTipo'];
            $id_sucursal = $var['idSucursal'];
            $foto = $var['foto'];
         }
         if (strtoupper($email) == strtoupper($usuario) && $password == $pass2) {
            $_SESSION ['idEjecutivo'] = $id;
            $_SESSION ['Nombre'] = $nombre;
            $_SESSION ['Apellido1'] = $apellido1;
            $_SESSION ['Apellido2'] = $apellido2;
            $_SESSION ['email'] = $email;
            $_SESSION ['idPerfil'] = $id_perfil;
            $_SESSION ['idTipo'] = $id_tipo;
            $_SESSION ['idSucursal'] = $id_sucursal;
            $_SESSION ['foto'] = $foto;
            header('location:../inicio/index.php');
            //header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
           }
           else {
             header('location:../extend/alerta.php?msj=No tienes el permiso para entrar&c=salir&p=salir&t=error');
         }
       }else {
         header('location:../extend/alerta.php?msj=Nombre de usuario o contraseña incorrecto...&c=salir&p=salir&t=error');
       }
  }
}else {
  header('location:../extend/alerta.php?msj=Utilza el formulario&c=salir&p=salir&t=error');
}
 ?>
