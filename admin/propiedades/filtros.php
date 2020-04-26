<script src="../js/materialize.min.js"></script>
<style media="screen">
html {
  font-size: 14px !important;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
}
.select-wrapper span.caret{
  display: none;
}
.inputtext{
  margin-top: 8px !important;
  height: 40px !important;
}
.datepicker{
  height: 38px !important;
  margin-top: 2px !important;
}
</style>
<ul class="collapsible">
  <li class="active">
    <div class="collapsible-header"><i class="material-icons">find_in_page</i>Buscar</div>
    <div class="collapsible-body white">
      <div class="row">
        <br>
        <div class="input-field col s2">
          <input placeholder="Placeholder" id="ID" type="Text" class="inputtext">
          <label for="ID">ID</label>
        </div>
        <div class="input-field col s2">
          <input placeholder="Placeholder" id="ID_Antiguo" type="Text" class="inputtext">
          <label for="ID_Antiguo">ID Antiguo</label>
        </div>
        <div class="col s2">
          <label for="provincia">Provincia</label>
          <div class="res_provincia"></div>
        </div>
        <div class="col s2">
          <label for="canton">Cantón</label>
          <div class="res_canton">
            <select class="browser-default" id="canton"disabled>
              <option value="" disabled selected>Escoja canton...</option>
            </select>
          </div>
        </div>
        <div class="col s4">
          <label for="Precio">Precio propiedad</label>
           <div id="Precio"></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s2">
          <input placeholder="Título" id="Titulo" type="text" class="inputtext">
          <label for="Titulo">Título</label>
        </div>
        <div class="input-field col s2">
          <input placeholder="Rótulo" id="Rotulo" type="text" class="inputtext">
          <label for="Rotulo">Rótulo</label>
        </div>
        <div class="col s2">
          <label for="distrito">Distrito</label>
          <div class="res_distrito">
            <select class="browser-default" id="distrito"disabled>
              <option value="" disabled selected>Escoja distrito..</option>
            </select>
          </div>
        </div>
        <div class="input-field col s2">
          <input placeholder="Cuidad" id="Cuidad" type="text" class="inputtext">
          <label for="Cuidad">Cuidad</label>
        </div>
        <div class="col s4">
          <div class="col s6">
            <label for="Alquiler_de">Alquiler de:</label>
            <select class="browser-default" id="Alquiler_de">
              <option value="0/500" disabled selected>Menos de $500</option>
              <option value="0/500">Menos de $500</option>
              <option value="500/1000">De $500 a $1000</option>
              <option value="1000/2000">De $1000 a $2000</option>
              <option value="1000">1000m2</option>
              <option value="2000/1000000">Mas de $2000</option>
            </select>
          </div>
          <div class="col s6">
            <label for="Alquiler_a">a:</label>
            <select class="browser-default" id="Alquiler_a">
              <option value="2000/1000000" disabled selected>Mas de $2000</option>
              <option value="0/500">Menos de $500</option>
              <option value="500/1000">De $500 a $1000</option>
              <option value="1000/2000">De $1000 a $2000</option>
              <option value="1000">1000m2</option>
              <option value="2000/1000000">Mas de $2000</option>
            </select>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s4">
          <div class="col s6">
            <label for="Tipo">Tipo:</label>
            <div class="res_tipo">
              <select class="browser-default" id="Tipo" disabled>
                <option value="" disabled selected>Escoja tipo</option>
              </select>
            </div>
          </div>
          <div class="col s6">
            <label for="SubTipo">Sub-Tipo:</label>
            <div class="res_subtipo">
              <select class="browser-default" id="SubTipo" disabled>
                <option value="" disabled selected>Escoja SubTipo</option>
              </select>
            </div>
          </div>
        </div>
        <div class="input-field col s2">
          <input placeholder="Barrio" id="Barrio" type="text" class="inputtext">
          <label for="Barrio">Barrio</label>
        </div>
        <div class="col s6">
          <div class="col s3">
            <label for="Area_de">Area cons. de:</label>
            <select class="browser-default" id="Area_de">
              <option value="100" disabled selected>100m2</option>
              <option value="100">100m2</option>
              <option value="250">250m2</option>
              <option value="500">500m2</option>
              <option value="1000">1000m2</option>
              <option value="+1000">+ de 1000m2</option>
            </select>

          </div>
          <div class="col s3">
            <label for="Area_a">a:</label>
            <select class="browser-default" id="Area_a">
              <option value="+1000" disabled selected>+1000m2</option>
              <option value="100">100m2</option>
              <option value="250">250m2</option>
              <option value="500">500m2</option>
              <option value="1000">1000m2</option>
              <option value="+1000">+ de 1000m2</option>
            </select>
          </div>
          <div class="col s3">
            <label for="Tamano_de">Tam. Lote de:</label>
            <select class="browser-default" id="Tamano_de">
              <option value="100" disabled selected>100m2</option>
              <option value="100">100m2</option>
              <option value="250">250m2</option>
              <option value="500">500m2</option>
              <option value="1000">1000m2</option>
              <option value="+1000">+ de 1000m2</option>
            </select>

          </div>
          <div class="col s3">
            <label for="Tamano_a">a:</label>
            <select class="browser-default" id="Tamano_a">
              <option value="+1000" disabled selected>+1000m2</option>
              <option value="100">100m2</option>
              <option value="250">250m2</option>
              <option value="500">500m2</option>
              <option value="1000">1000m2</option>
              <option value="+1000">+ de 1000m2</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s4">
          <div class="col s6">
              <label class="active" for="FechaInicio">Fecha Inicio</label>
              <input id="FechaInicio" type="text" class="datepicker">
          </div>
          <div class="col s6">
              <label class="active" for="FechaFinal">Fecha Final<br></label>
              <input id="FechaFinal" type="text" class="datepicker">
          </div>
        </div>
        <div class="col s6">
          <div class="col s6">
            <label for="Ejecutivo">Ejecutivo</label>
            <div class="res_ejecutivo"> </div>
          </div>
          <div class="col s6">
            <label for="Contacto">Contacto</label>
            <div class="res_contacto"></div>
          </div>
        </div>
        <div class="col s2">
          <div class="col s6">
            <label for="Dormitorios">N° Dor.</label>
            <select class="browser-default" id="Dormitorios">
              <option value="1" disabled selected>1+</option>
              <option value="1">1+</option>
              <option value="2">2+</option>
              <option value="3">3+</option>
              <option value="4">4+</option>
              <option value="5">5+</option>
              <option value="6">6+</option>
              <option value="7">7+</option>
              <option value="8">8+</option>
              <option value="9">9+</option>
            </select>
          </div>
          <div class="col s6">
            <label for="Garaje">N° Garajes</label>
            <select class="browser-default" id="Garaje">
              <option value="1" disabled selected>1+</option>
              <option value="1">1+</option>
              <option value="2">2+</option>
              <option value="3">3+</option>
              <option value="4">4+</option>
              <option value="5">5+</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
          <label class="col s2">
            <input id="Amueblado" type="checkbox" class="filled-in" value="Amueblado" name="otros" />
            <span>Amueblado</span>
          </label>
          <label class="col s2">
            <input id="UnaPlanta" type="checkbox" class="filled-in" value="UnaPlanta" name="otros" checked/>
            <span>Una Planta</span>
          </label>
          <label class="col s4">
            <input id="Borradas" type="checkbox" class="filled-in" value="Borradas" name="otros" />
            <span>Propiedades Borradas / Vendidas</span>
          </label>
          <label class="col s2">
            <input id="Exclusiva" type="checkbox" class="filled-in" value="Exclusiva" name="otros" checked />
            <span>Propiedades Es Exclusiva</span>
          </label>
          <label class="col s2">
            <input id="Destacadas" type="checkbox" class="filled-in" value="Destacadas" name="otros" />
            <span>Propiedades Destacadas</span>
          </label>
          <input type="hidden" id ="strOtros">
      </div>
      <div class="row">
        <a id ="filtro" class="waves-effect waves-light btn"><i class="material-icons right">open_in_new</i>Consultar</a>


      </div>
    </div>
  </li>
</ul>
<script type="text/javascript">
$('select').material_select();
function may(obj, id) {
  obj = obj.toUpperCase();
  document.getElementById(id).value = obj;
}
$(document).ready(function(){
  $('.datepicker').pickadate({
    format:'yyyy-m-d',
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
  $.post('ajax_listas.php',{
      beforeSend: function () {
      $('.res_provincia').html('Espere un momento por favor');
     }
   }, function (respuesta) {
        $('.res_provincia').html(respuesta);
  });
  $.post('ajax_listas.php',{
      tipo:1,
      beforeSend: function () {
      $('.res_tipo').html('Espere un momento por favor');
     }
   }, function (respuesta) {
        $('.res_tipo').html(respuesta);
  });
  $.post('ajax_listas.php',{
      Ejecutivo:1,
      beforeSend: function () {
      $('.res_ejecutivo').html('Espere un momento por favor');
     }
   }, function (respuesta) {
        $('.res_ejecutivo').html(respuesta);
  });
  $.post('ajax_listas.php',{
      Contacto:1,
      beforeSend: function () {
      $('.res_contacto').html('Espere un momento por favor');
     }
   }, function (respuesta) {
        $('.res_contacto').html(respuesta);
  });
  });
  var slider = document.getElementById('Precio');
  noUiSlider.create(slider, {
   start: [990000, 3000000],
   tooltips: [true, true],
   connect: true,
   step: 20000,
   orientation: 'horizontal', // 'horizontal' or 'vertical'
   range: {
     'min': 50000,
     'max': 5000000
   },
   format: wNumb({
     decimals: 0
   })
  });
</script>
