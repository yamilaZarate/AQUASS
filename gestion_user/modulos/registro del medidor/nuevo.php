<?php

require_once "../../class/Empleado.php";
require_once "../../class/Medidor.php";
require_once "../../class/RegistroMedidor.php";

$listadoEmpleado = Empleado::obtenerTodos();
$listadoMedidor = Medidor::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

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
	/*resize: vertical | horizontal | none | both*/
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

			<form align="center" method="POST" action="procesar_alta.php">
				<h2 align="center">Registro del Medidor</h2>

				<br><br>
				<label for="Medidor">Medidor</label>
				<select name="cboMedidor">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoMedidor as $medidor): ?>

						<option value="<?php echo $medidor->getIdMedidor(); ?>">
							<?php echo $medidor->getNumero(); ?>
						</option>

					<?php endforeach ?>

				</select>
				
				<br>
				<?php $fecha = date("Y-m-d");?>
				<input type="hidden" id="txtFecha" name="txtFecha" value="<?php echo $fecha?>">
				<br><br>


				<label for="empleado">Empleado</label>
				<select name="cboEmpleado">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoEmpleado as $empleado): ?>

						<option value="<?php echo $empleado->getIdEmpleado(); ?>">
							<?php echo $empleado->getNombre();
							echo" "; echo $empleado->getApellido(); ?>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>

				<label for="lectura actual">Lectura actual</label>
				<input type="txt" id="txtLecturaActual" name="txtLecturaActual" placeholder="Ingresa la lectura actual" required== $0>
				<br><br>

				<label for="Consumo">Consumo</label>
				<input type="txt" id="txtConsumo" name="txtConsumo"  placeholder="ingresa los primeros 2 numeros de la lectura actual">
				<br><br>

				<button type="submit" class="guardar" onclick="validar()";>Guardar</button>
				
				<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>
			</form>
		</div>
	</div>

</body>
</html>