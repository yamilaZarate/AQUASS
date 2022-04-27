<?php

require_once "../../class/RegistroMedidor.php";

$id_registro_medidor = $_GET["id_registro_medidor"];

$registroMedidor = RegistroMedidor::obtenerPorId($id_registro_medidor);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">

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
		<?php require_once "../../menu.php"; ?>
	</header>
	<div id="primerContenedor">
		<div id="contenedorgeneral">

			<form align="center" method="POST" action="procesar_modificar.php">
				<h3 align="center">Modificar Datos del Registro</h3>


				<input type="hidden" name="txtIdRegistroMedidor" value="<?php echo $id_registro_medidor; ?>">

				Lectura Actual: <input type="text" name="txtLecturaActual" value="<?php echo $registroMedidor->getLecturaActual(); ?>"required== $0>
				<br><br>

				Consumo:<input type="text" name="txtConsumo" value="<?php echo $registroMedidor->getConsumo(); ?>">
				<br><br>

				<br>
				<?php $fecha = date("Y-m-d");?>
				<input type="hidden" id="txtFecha" name="txtFecha" value="<?php echo $fecha?>">

				<button type="submit" class="guardar" onclick="validar()";>Guardar</button>
				
				<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>				
			</form>
		</div>
	</div>
</body>
</html>