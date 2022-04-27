<?php

require_once "../../class/Cliente.php";
require_once "../../class/Factura.php";
require_once "../../class/estadoPago.php";
require_once "../../class/Medidor.php";
require_once "../../class/Categoria.php";
require_once "../../class/Periodo.php";

$listadoFactura = Factura::obtenerTodos();
$listadoCliente = Cliente::obtenerTodos();
$listadoMedidor = Medidor::obtenerTodos();
$listadoEstadoPago = EstadoPago::obtenerTodos();
$listadoPeriodo = Periodo::obtenerTodos();
$listadoCategoria = Categoria::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Gestion de Pagos</title>

</head>
<body>
	<header>
		<nav>
			<?php require_once "../../menu.php"; ?>
		</nav>
	</header>

	<br><br>

	<form method="POST" action="procesar_alta.php">

		Numero:
		<select name="cboFactura">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoFactura as $factura): ?>

		    	<option value="<?php echo $factura->getIdFactura(); ?>">
		    		<?php echo $factura->getNumero() ; ?>
		    	</option>

		    <?php endforeach ?>

		</select>
		<br><br>


		Cliente:
		<select name="cboCliente">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoCliente as $cliente): ?>

		    	<option value="<?php echo $cliente->getIdCliente(); ?>">
		    		<?php echo $cliente->getNombre() ; ?>
		    		<?php echo $cliente->getApellido() ; ?>
		    	</option>

		    <?php endforeach ?>

		</select>
		<br><br>
		
		Estado de Pago:
		<select name="cboEstadoPago">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoEstadoPago as $estadoPago): ?>

		    	<option value="<?php echo $estadoPago->getIdEstadoPago(); ?>">
		    		<?php echo $estadoPago->getDescripcion() ; ?>
		    	</option>

		    <?php endforeach ?>

		</select>
		<br><br>

		Periodo:
		<select name="cboPeriodo">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoPeriodo as $periodo): ?>

		    	<option value="<?php echo $periodo->getIdPeriodo(); ?>">
		    		<?php echo $periodo->getFecha() ; ?>
		    	</option>

		    <?php endforeach ?>

		</select>
		<br><br>


		Medidor:
		<select name="cboMedidor">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoMedidor as $medidor): ?>

		    	<option value="<?php echo $medidor->getIdMedidor(); ?>">
		    		<?php echo $medidor->getNumero() ; ?>
		    	</option>

		    <?php endforeach ?>

		</select>
		<br><br>
			
		<input type="submit" name="Guardar">
		
	</form>

</body>
</html>