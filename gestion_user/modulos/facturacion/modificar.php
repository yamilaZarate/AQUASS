<?php

require_once "../../class/Factura.php";

$id_factura = $_GET["id_factura"];

$factura = Factura::obtenerPorId($id_factura);

require_once "../../class/Cliente.php";
require_once "../../class/Periodo.php";
require_once "../../class/Medidor.php";
require_once "../../class/RegistroMedidor.php";
require_once "../../class/EstadoPago.php";

$listadoCliente = Cliente::obtenerTodos();
$listadoPeriodo = Periodo::obtenerTodos();
$listadoMedidor = Medidor::obtenerTodos();
$listadoRegistro = RegistroMedidor::obtenerTodos();
$listadoEstadoPago = EstadoPago::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
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
			
			<form align="center" method="POST" action="procesar_modificar.php">
				<h3 align="center">Modificar Datos de la Factura</h3>


				<input type="hidden" name="txtIdFactura" value="<?php echo $id_factura;?>">

				<input type="hidden" name="txtNumero" value="<?php echo $factura->getNumero();?>">

				Fecha de Emision: <input type="date" name="txtFechaEmision" value="<?php echo $factura->getFechaEmision();?>">
				<br><br>



				Estado de pago:
				<select name="cboEstadoPago">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoEstadoPago as $estadoPago): ?>

						<?php

						$selected = "";

						if ($estadoPago->getIdEstadoPago() == $factura->getIdEstadoPago()) {
							$selected = "SELECTED";
						}

						?>

						<option <?php echo $selected; ?> value="<?php echo $estadoPago->getIdEstadoPago(); ?>">
							<?php echo $estadoPago->getDescripcion() ; ?>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>

				Periodo:
				<select name="cboPeriodo">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoPeriodo as $periodo): ?>

						<?php

						$selected = "";

						if ($periodo->getIdPeriodo() == $factura->getIdPeriodo()) {
							$selected = "SELECTED";
						}

						?>

						<option <?php echo $selected; ?> value="<?php echo $periodo->getIdPeriodo(); ?>">
							<?php echo $periodo->getMes();echo " "; echo $periodo->getAnio(); ?></td>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>

				Medidor:
				<select name="cboMedidor">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoMedidor as $medidor): ?>

						<?php

						$selected = "";

						if ($medidor->getIdMedidor() == $factura->getIdMedidor()) {
							$selected = "SELECTED";
						}

						?>

						<option <?php echo $selected; ?> value="<?php echo $medidor->getIdMedidor(); ?>">
							<?php echo $medidor->getNumero() ; ?>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>

				1er vencimiento: <input type="date" name="txt1erVencimiento" value="<?php echo $factura->getPrimerVencimiento();?>">
				<br><br>

				2do vencimiento: <input type="date" name="txt2doVencimiento"value="<?php echo $factura->getSegundoVencimiento();?>">
				<br><br>

				<input type="hidden" name="txtIdRegistroMedidor" value="<?php echo $id_factura;?>">

				<button type="submit" class="guardar" onclick="validar()";>Guardar</button>
				
				<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>
			</form>
		</div>
	</div>


</body>
</html>