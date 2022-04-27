<?php

require_once "../../class/Sexo.php";
require_once "../../class/Empleado.php";


$numeroLegajo = Empleado::obtenerNumeroLegajo();
//highlight_string(var_export($numeroLegajo));
//exit;


$listadoSexo = Sexo::obtenerTodos();
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarEmpleado.js"></script>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

	<title></title>

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
	width:90px;
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

 			<form align="center" target="" method="POST" action="procesar_alta.php" name="formDatosPersonales">

 				<h2 align="center">Registro de empleado</h2>
 				<label for="nombre">Nombre *</label>
 				<input type="text" id="txtNombre" name="txtNombre" placeholder="Escribe tu nombre" required="0">
 				<br><br>

 				<label for="Apellido">Apellido *</label>
 				<input type="text" id="txtApellido" name="txtApellido" placeholder="Escribe tu Apellido">
 				<br><br>


				<label for="dni">DNI *</label>
				<input type="number" id="txtDni" name="txtDni"placeholder="Introduzca su DNI"required="0">
				<br><br>

 				<input type="hidden" name="txtNumeroLegajo" id="txtNumeroLegajo" value="<?php echo $numeroLegajo?>">
 				


				<input type="hidden" name="txtEstado" value="<?php echo "1"; ?>">

 				<label for="sexo">Genero</label>
 				<select name="cboSexo">
 					<option value="NULL">---Seleccionar---</option>

 					<?php foreach ($listadoSexo as $sexo): ?>

 						<option value="<?php echo $sexo->getIdSexo(); ?>">
 							<?php echo $sexo->getDescripcion(); ?>
 						</option>

 					<?php endforeach ?>

 				</select>
 				<br><br>

 				<button type="submit" class="guardar" onclick="validar()";>Guardar</button>
				
				<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>

 			</form>
 		</div>
 	</div>


</body>
</html>