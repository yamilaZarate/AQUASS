<?php
require_once "../../class/Domicilio.php";
require_once "../../class/PersonaDomicilio.php";
require_once "../../class/Empleado.php";
require_once "../../class/Barrio.php";
require_once "../../class/Localidad.php";
require_once "../../class/Provincia.php";
require_once "../../class/Pais.php";
$listadoPais = Pais::obtenerTodos();

$listadoProvincia = Provincia::obtenerTodos();
$listadoLocalidad = Localidad::obtenerTodos();
$listadoBarrio = Barrio::obtenerTodos();


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/reset.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
  <link rel="stylesheet" href="../../css/main2.css">
  <title>Formulario</title>
</head>
<body>
  <br>

  <?php require_once "../../menu.php"; ?>
  <div class="container">
    <div class="form__top">
      <h2>Formulario Añadir <span>Domicilio</span></h2>
    </div>  

  <br><br>

  <form method="POST" action="procesar_alta.php" class="form__reg">
    

    <div class="row col-xs-12">
      <label style="color:#FFFFFF">Pais</label>
      <select id="lista1" name="lista1" class="input">
        <option value=0>-- Seleccionar --</option>

          <?php foreach ($listadoPais as $pais): ?>

        <option value="<?php echo $pais->getIdPais(); ?>">
          <?php echo $pais->getDescripcion(); ?>
        </option>
      
          <?php endforeach ?>

      </select>

      <br>
      <div id="select2lista"></div>
        <br>

    Provincia: <input type="text" name="txtProvincia" class="input">
    <br><br>

    Localidad: <input type="text" name="txtLocalidad" class="input">
    <br><br>

    Barrio: <input type="text" name="txtBarrio" class="input">
    <br><br>

    Calle: <input type="text" name="txtCalle" class="input">
    <br><br>

    Altura: <input type="text" name="txtAltura" class="input">
    <br><br>

    Manzana: <input type="text" name="txtManzana" class="input">
    <br><br>

    Casa: <input type="text" name="txtCasa" class="input">
    <br><br>

    Torre: <input type="text" name="txtTorre" class="input">
    <br><br>

    Piso: <input type="text" name="txtPiso" class="input">
    <br><br>

    <input type="submit" name="Guardar" class="btn__submit" >
    <input type="hidden" name="Cancelar" class="btn__submit" >
    <button type="cancel" onclick="javascript:window.location='http://stackoverflow.com';">Cancel</button>
    
    
  </form>

</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#lista1').val(1);
    recargarLista();

    $('#lista1').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"datos.php",
      data:"continente=" + $('#lista1').val(),
      success:function(r){
        $('#select2lista').html(r);
      }
    });
  }
</script>
