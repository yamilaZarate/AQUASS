<?php

require_once "../../class/EstadoPago.php";
?>

<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarEstadoPago.js"></script>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
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
			width:95px;
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

	<br><br>

		<form align="center" target="" method="POST" action="procesar_alta.php">
			<h2 align="center">Registro de Estados</h2>
			<label for="nombre">Descripcion*</label>
			<input type="text" id="txtDescripcion" name="txtDescripcion" placeholder="introduce la Descripcion" required="0">
		<br><br>

		<button type="submit" class="guardar" onclick="validar();">Guardar</button>
				
		<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>
							
	</form>

</body>
</html>