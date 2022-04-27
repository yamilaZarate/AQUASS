<?php


require_once "../../class/PersonaDomicilio.php";
require_once "../../class/Empleado.php";
require_once "../../class/Pais.php";
require_once "../../class/Provincia.php";
require_once "../../class/Localidad.php";
require_once "../../class/Barrio.php";

$listadoPais = Pais::obtenerTodos();
$listadoProvincia = Provincia::obtenerTodos();
$listadoLocalidad = Localidad::obtenerTodos();
$listadoBarrio = Barrio::obtenerTodos();

$id_persona_domicilio = $_GET['id_persona_domicilio'];
$persona= $_GET['id_persona'];
//$modulo = $_GET['modulo'];
///

///switch ($modulo) {

	///case 'empleados':
		///$persona = Empleado::obtenerPorIdPersona($idPersona);
		//break;

	//case 'clientes':
		// $persona = Cliente::obtenerPorIdPersona($idPersona); No
	  //  echo "viene de clientes";
	   // exit;
		//break;
	
	//default:
	//	echo "Modulo no valido";
	//	exit;

//}


$domicilio = PersonaDomicilio::obtenerPorIdPD($id_persona_domicilio);


//highlight_string(var_export($listadoDomicilios, true));


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../css/reset.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<link rel="stylesheet" href="../../css/main2.css">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script src="jquery.js"></script>
	<title>Formulario</title>
		<style>
		*{box-sizing:border-box;}

		form{
			width:400px;
			padding:35px;
			border-radius:25px;
			margin:auto;
			background-color:#dfe9f3;
		}

		form label{
			width:72px;
			font-weight:bold;
			display:inline-block;
			color: black;
		}

		form input[type="text"],
		form input[type="email"]{
			width:200px;
			padding:3px 5px;
			border:1px solid #f6f6f6;
			border-radius:5px;
			background-color:#f6f6f6;
			margin:10px 0;
			display:inline-block;
		}

		form input[type="submit"]{
			width:100%;
			padding:8px 16px;
			margin-top:32px;
			border:1px;
			border-radius:7px;
			display:block;
			color:#fff;
			background-color:#37b839;
		} 

		form input[type="submit"]:hover{
			cursor:pointer;
		}

		textarea{
			width:100%;
			height:100px;
			border:1px solid #BAFAFA;
			border-radius:3px;
			background-color:#BAFAFA;			
			margin:10px 0;
			resize:none;
			display:block;
		}
	</style>
</head>
<body>
	<header>
		<nav>
			<?php require_once "../../menu.php"; ?>
		</nav>
	</header>

	<div id="primerContenedor">
		<div id="contenedorgeneral">
			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>

	<div class="container">
		<div class="form__top">
			<h2 align="center">Formulario Modificar <span>Domicilio</span></h2><div> 
  <span><?php echo $persona; ?></span>
</div>
		</div>

	<form method="POST" action="procesar_modificar.php">

	<input type="hidden" name="txtIdPersona" value="<?php echo $id_persona_domicilio; ?>">
	<input type="hidden" name="txtId" value="<?php echo $persona; ?>">
		
		<div class="row col-xs-12">
			<div class="form-group">
			<label style="color:black"><center>Pais</center></label>
			<center><select id="lista1" name="lista1" class="input">
				<option value=0>-- SELECCIONE --</option>

					<?php foreach ($listadoPais as $pais): ?>

				<?php

		    	$selected = "";

		    	if ($pais->getIdPais() == $domicilio->barrio ->localidad->provincia->pais->getIdPais()) {
		    		$selected = "SELECTED";
		    	}

		    	?>

				<option <?php echo $selected; ?> value="<?php echo $pais->getIdPais(); ?>">
					<?php echo $pais->getDescripcion(); ?>
				</option>
			
					<?php endforeach ?>
			</select></center>
		</div>
		<br>
		<div class="form-group">
    		<label for="name1" style="color:black;"> <center>Provincia</center></label>
    		<center><select id="select2lista" class="input"  name="select2lista" required>
    			<option value=0>-- SELECCIONE --</option>

    			<?php foreach ($listadoProvincia as $provincia): ?>

    			<?php

		    	$selected = "";

		    	if ($provincia->getIdProvincia() == $domicilio->barrio ->localidad->provincia->getIdProvincia()) {
		    		$selected = "SELECTED";
		    	}

		    	?>
      			<option <?php echo $selected; ?> value="<?php echo $provincia->getIdProvincia(); ?>">
					<?php echo $provincia->getDescripcion(); ?>
				</option>
				<?php endforeach ?>
   			</select></center>
  			</div>
  			<br>
			<div class="form-group">
    		<label for="name1" style="color:black;"><center>Localidad</center></label>
    		<center><select id="select3lista" class="input" name="select3lista" required>
      			<option value=0>-- SELECCIONE --</option>

    			<?php foreach ($listadoLocalidad as $localidad): ?>

    			<?php

		    	$selected = "";

		    	if ($localidad->getIdLocalidad() == $domicilio->barrio ->localidad->getIdLocalidad()) {
		    		$selected = "SELECTED";
		    	}

		    	?>
      			<option <?php echo $selected; ?> value="<?php echo $localidad->getIdLocalidad(); ?>">
					<?php echo $localidad->getDescripcion(); ?>
				</option>
				<?php endforeach ?>
   			</select></center>
  			</div>
			<br>
			<div class="form-group">
    		<label for="name1" style="color:black;"><center>Barrio</center></label>
    		<center><select id="select4lista" class="input" name="select4lista" required>
      			<option value=0>-- SELECCIONE --</option>

    			<?php foreach ($listadoBarrio as $barrio): ?>

    			<?php

		    	$selected = "";

		    	if ($barrio->getIdBarrio() == $domicilio->barrio ->getIdBarrio()) {
		    		$selected = "SELECTED";
		    	}

		    	?>
      			<option <?php echo $selected; ?> value="<?php echo $barrio->getIdBarrio(); ?>">
					<?php echo $barrio->getDescripcion(); ?>
				</option>
				<?php endforeach ?>
   			</select></center>
  			</div>
  		<br>
		<center>Calle</center>
			<center><input type="text" name="txtCalle" value="<?php echo $domicilio->getCalle(); ?>" class="input"></center>
		<br>
		<center>Altura:</center>
			<center><input type="text" name="txtAltura" value="<?php echo $domicilio->getAltura(); ?>" class="input"></center>
		<br>
		<center>Manzana:</center>
			<center><input type="text" name="txtManzana" value="<?php echo $domicilio->getManzana(); ?>" class="input"></center>
		<br>
		<center>Casa:</center>
			<center><input type="text" name="txtCasa" value="<?php echo $domicilio->getNumeroCasa(); ?>" class="input"></center>
		<br>
		<center>Torre:</center>
			<center><input type="text" name="txtTorre" value="<?php echo $domicilio->getTorre(); ?>" class="input"></center>
		<br>
		<center>Piso:</center> 
			<center><input type="text" name="txtPiso" value="<?php echo $domicilio->getPiso(); ?>" class="input"></center>
		<br>
		<center>Observaciones:</center>
		 	<center><input type="text" name="txtObservaciones" value="<?php echo $domicilio->getObservaciones(); ?>" class="input"></center>
	
		</div>
		<center><input type="submit" name="Guardar" class="btn__submit" ></center>

</form>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$("#lista1").change(function(){
			$.ajax({
			type:"POST",
			url:"datos.php",
			data:"pais=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);}

			});
		});

		$("#select2lista").change(function(){
			$.ajax({
			type:"POST",
			url:"datos2.php",
			data:"provincia=" + $('#select2lista').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
			});
		});

		$("#select3lista").change(function(){
			$.ajax({
			type:"POST",
			url:"datos3.php",
			data:"localidad=" + $('#select3lista').val(),
			success:function(r){
				$('#select4lista').html(r);
			}
			});
		});
	});
</script>