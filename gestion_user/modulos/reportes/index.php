<?php

if (isset($_GET['txtFechaDesde'])) {
	$fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaDesde'])) {
	$fechaHasta = $_GET['txtFechaHasta'];
}

if (!isset($_GET['cboEstado'])) {
	$marca = 0;
} else {
	$marca = $_GET['cboEstado'];
}


if (!isset($_GET['txtFechaDesde'])) {
	$listado = [];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reporte</title>
</head>
<body>

	<h2>Generar reporte de Factura</h2>

	<form action="reporte.php" method="post">
		Estado:
			<select name="cboEstado">
				<option value="0">Todos</option>
				<option value="1">Pagado</option>
				<option value="2">No Pagado</option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;



		Desde: <input type="date" name="txtFechaDesde" required="required">

		&nbsp;&nbsp;&nbsp;&nbsp;

		Hasta: <input type="date" name="txtFechaHasta" required="required">

		&nbsp;&nbsp;&nbsp;&nbsp;

		<input type="submit" name="Filtrar">
	</form>



</body>
</html>