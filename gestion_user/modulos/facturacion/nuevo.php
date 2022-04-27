<?php

require_once "../../class/Cliente.php";
require_once "../../class/Factura.php";
require_once "../../class/estadoPago.php";
require_once "../../class/Medidor.php";
require_once "../../class/Periodo.php";
require_once "../../class/RegistroMedidor.php";

$listadoRegistro = RegistroMedidor::obtenerTodos();
$listadoCliente = Cliente::obtenerTodos();
$listadoMedidor = Medidor::obtenerTodos();
$listadoEstadoPago = EstadoPago::obtenerTodos();
$listadoPeriodo = Periodo::obtenerTodos();
$numero = Factura::obtenerNumero();
//highlight_string(var_export($numero));

?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarFactura.js"></script>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

	<title>Facturacion</title>

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
		width:100px;
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
		margin:10px 30;
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
				<h2 align="center">Registro de factura</h2>

				<input type="hidden" name="txtIdFactura" value="<?php echo $idFactura?>">
				
				<input type="hidden" id="txtNumero" name="txtNumero" value="<?php echo $numero?>">
				

				<?php $fechaEmision = date("Y-m-d"); ?>
				<input type="hidden" name="txtFechaEmision" value="<?php echo $fechaEmision; ?>">


				<input type="hidden" name="txtEstadoPago" value="<?php echo "2"; ?>">


				<label for="periodo">Periodo *</label>
				<select name="cboPeriodo" id="cboPeriodo" required="0">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoPeriodo as $periodo): ?>

						<option value="<?php echo $periodo->getIdPeriodo(); ?>">
							<?php echo $periodo->getMes();echo " "; echo $periodo->getAnio(); ?>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>

				<label for="medidor">Medidor *</label>
				<select name="cboMedidor" id="cboMedidor" required="0">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoMedidor as $medidor): ?>

						<option value="<?php echo $medidor->getIdMedidor(); ?>">
							<?php echo $medidor->getNumero() ; ?>
						</option>

					<?php endforeach ?>
				</select> 
				<br><br>

				<label for="1ervencimiento" id="1ervencimiento">1er Vencimiento *</label>
				<input type="date" name="txt1erVencimiento" required="0">
				<br><br>

				<label for="2dovencimiento" id="2dovencimiento">2do Vencimiento *</label>
				<input type="date" name="txt2doVencimiento" required="0">
				<br><br>
			
				<button type="submit" class="guardar" onclick="validar()";>Guardar</button>
				
				<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>
		</form>
	</div>
</div>

</body>
</html>