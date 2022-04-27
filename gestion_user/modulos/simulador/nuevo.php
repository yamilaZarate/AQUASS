<?php

require_once "../../class/Cliente.php";
require_once "../../class/Actividad.php";
require_once "../../class/Simulador.php";

$listadoCliente = Cliente::obtenerTodos();
$listadoActividad = Actividad::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<br><br>

	<form method="POST" action="procesar_alta.php">

		Medidor:
		<select name="cbo">
		    <option value="NULL">---Seleccionar---</option>

		    <?php foreach ($listadoMedidor as $medidor): ?>

		    	<option value="<?php echo $medidor->getIdMedidor(); ?>">
		    		<?php echo $medidor->getNumero(); ?>
		    	</option>

		    <?php endforeach ?>

		</select>
		<br><br>

		Fecha: <input type="date" id="txtFecha" name="txtFecha" required== $0>
		<br><br>

		Empleado:
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


		Lectura Actual: <input type="txt" id="txtLecturaActual" name="txtLecturaActual" required== $0>
		<br><br>

		Consumo: <input type="txt" id="txtConsumo" name="txtConsumo">
		<br><br>


		<input type="submit" name="Guardar">
		
	</form>

</body>
</html>