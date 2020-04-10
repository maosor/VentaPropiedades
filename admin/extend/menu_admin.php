
  <nav class="darken-blue">
    <a href="#" data-activates="menu" class="button-collapse"><i class="material-icons">menu</i></a>
  </nav>
  <ul id="menu" class="side-nav fixed blue lighten-5">
    <li>
      <div class="userView">
        <div class="background fixed">
          <img src="../css/images/abstract-q-c-640-480-9.jpg" style="width: 100%;">
        </div>
        <a href="../perfil/index.php"><img src="../perfil/<?php echo $_SESSION['foto'] ?>" class="circle" alt=""></a>
          <a href="../perfil/perfil.php" class="white-text"><?php echo $_SESSION['Nombre'].' '. $_SESSION['Apellido1'].' '.$_SESSION['Apellido2'] ?></a>
          <a href="../perfil/perfil.php" class="white-text"><?php echo $_SESSION['email'] ?> </a>
      </div>
    </li>
    <li><a href="../inicio"><i class="material-icons">home</i>INICIO</li></a>
    <li><div class="divider"></div></li>
    <li><a class="dropdown-button" href="#!" data-activates="mantenimientos"><i class="material-icons">apps</i>Mantenimientos
    <i class="material-icons right">arrow_drop_down</i></a></li>
    <li><div class="divider"></div></li>
  <!--  <li><a href="../ejecutivos"><i class="material-icons">contact_phone</i>Ejecutivos</li></a>
    <li><div class="divider"></div></li>
    <li><a href="../sucursales"><i class="material-icons">location_city</i>Sucursales</li></a>
    <li><div class="divider"></div></li>
    <li><a href="../tiposyperfiles?a=t"><i class="material-icons">dehaze</i>Tipos Ejecutivo</li></a>
    <li><div class="divider"></div></li>
    <li><a href="../tiposyperfiles?a=p"><i class="material-icons">contacts</i>Perfiles Ejecutivo</li></a>
    <li><div class="divider"></div></li>
    <li><a href="../clientes"><i class="material-icons">people</i>Clientes</li></a>
    <li><div class="divider"></div></li>
    <li><a href="../contactos"><i class="material-icons">perm_contact_calendar</i>Contactos</li></a>
    <li><div class="divider"></div></li>


     <li><a href="../inicio/slider.php"><i class="material-icons">web</i>SLIDER</li></a>
    <li><div class="divider"></div></li> -->
    <li><a href="../login/salir.php"><i class="material-icons">power_setting_new</i>SALIR</li></a>
    <li><div class="divider"></div></li>
  </ul>

  <ul id="mantenimientos" class="dropdown-content">
    <li><a href="../ejecutivos">Ejecutivos</a></li>
    <li><a href="../sucursales">Sucursales</a></li>
    <li><a href="../tiposyperfiles?a=t">Tipos Ejecutivo</a></li>
    <li><a href="../tiposyperfiles?a=p">Perfiles Ejecutivo</a></li>
    <li><a href="../clientes">Clientes</a></li>
    <li><a href="../contactos">Contactos</a></li>
   </ul>
