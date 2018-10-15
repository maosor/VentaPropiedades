<?php include '../extend/header.php';

?>
  <div class="row">
    <div class="col s6">
      <h2 class="header">Cargar imagenes para slider</h2>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <form action="ins_slider.php" class="form" method="post" enctype="multipart/form-data">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Foto:</span>
                    <input type="file" name="ruta[]" multiple>
                   </div>
                  <div class="file-path-wrapper">
                    <input type="text" class="file-path validate">
                  </div>
                </div>
                <button type="submit" class="btn">Guardar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="row">
    <div class="col s12 center cargador">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <?php
          $sel_img = $con->prepare("SELECT id, ruta FROM slider ");
          $sel_img -> execute();
          $sel_img -> bind_result($id, $ruta);?>
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <?php while ($sel_img->fetch()) { ?>

            <a href="#" onclick="swal({title: '¿Esta seguro que desea eliminar la imagen?',text: 'Al eliminarla no podrá recuperarla!',
              type: 'warning',showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#d33', confirmButtonText: 'Si, Eliminarla!'
            }).then((result) => { location.href='eliminar_slider.php?id=<?php echo  $id?>&ruta=<?php echo  $ruta?>';})">
            <img src= "<?php echo  $ruta?>"alt=""></a>
          <?php }
          $sel_img-> close();
           ?>
        </div>
      </div>
    </div>
  </div>
 <?php include '../extend/scripts.php' ?>
 <script>
 $('.cargador').hide();
 $('.form').submit(function(event){
   $('.cargador').show();
 });

 </script>
</body>
</html>
