<?php

require_once "../../class/Periodo.php";

$id_periodo = $_GET["id_periodo"];

$periodo = Periodo::obtenerPorId($id_periodo);

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
		<nav>
			<?php require_once "../../menu.php"; ?>			
		</nav>
	</header>
	<div id="primerContenedor">
		<div id="contenedorgeneral">


			<form align="center" method="POST" action="procesar_modificar.php">
				<h3 align="center">Modificar Datos del Periodo</h3>

				<input type="hidden" name="txtIdPeriodo" value="<?php echo $id_periodo; ?>">

				Mes: <input type="text" name="txtMes" value="<?php echo $periodo->getMes(); ?>"required== $0>
				<br><br>

				Año: <input type="number" name="txtAnio" value="<?php echo $periodo->getAnio(); ?>"required== $0>
				<br><br>

				<button type="submit" class="guardar" onclick="validar()";>Guardar</button>
				
				<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>
			</form>
		</div>
	</div>
</body>
</html>