<?php

if (isset($_GET['txtFechaDesde'])) {
	$fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaDesde'])) {
	$fechaHasta = $_GET['txtFechaHasta'];
}

if (!isset($_GET['cboMarca'])) {
	$marca = 0;
} else {
	$marca = $_GET['cboMarca'];
}


if (!isset($_GET['txtFechaDesde'])) {
	$listado = [];
} else {

	if ($marca == 0) {
		$listado = [
			["marca" => "Ilolay", "producto" => "Yogurt", "cantidadVenta" => 1020, "total" => 55000],
			["marca" => "Ilolay", "producto" => "Leche", "cantidadVenta" => 5310, "total" => 400000],
			["marca" => "La Serenisima", "producto" => "Queso 1kg", "cantidadVenta" => 2511, "total" => 125300],
			["marca" => "La Serenisima", "producto" => "Queso untable", "cantidadVenta" => 710, "total" => 25689],
		];
	} else if ($marca == 1) {
		$listado = [
			["marca" => "Ilolay", "producto" => "Yogurt", "cantidadVenta" => 1020, "total" => 55000],
			["marca" => "Ilolay", "producto" => "Leche", "cantidadVenta" => 5310, "total" => 400000],
		];
	} else if ($marca == 2) {
		$listado = [
			["marca" => "La Serenisima", "producto" => "Queso 1kg", "cantidadVenta" => 2511, "total" => 125300],
			["marca" => "La Serenisima", "producto" => "Queso untable", "cantidadVenta" => 710, "total" => 25689],
		];
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reporte 2</title>
</head>
<body>


	<div align="center">

		<h2>Ventas</h2>
		<br>

		<form method="GET">
			Desde:
			<select name="cboMarca">
				<option value="0">Todos</option>
				<option value="1">Ilolay</option>
				<option value="2">La Serenisima</option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;

			Desde: <input type="date" name="txtFechaDesde" required="required">

			&nbsp;&nbsp;&nbsp;&nbsp;

			Hasta: <input type="date" name="txtFechaHasta" required="required">

			&nbsp;&nbsp;&nbsp;&nbsp;

			<input type="submit" name="Filtrar">
		</form>

		<br>

		<table border=1>
			
			<tr>
				<th>Marca</th>
				<th>Producto</th>
				<th>Cantidad Vendida</th>
				<th>Total ($)</th>
			</tr>

			<?php foreach ($listado as $producto): ?>

				<tr>
					<td><?php echo $producto['marca'] ?></td>
					<td><?php echo $producto['producto'] ?></td>
					<td><?php echo $producto['cantidadVenta'] ?></td>
					<td>$<?php echo $producto['total'] ?></td>
				</tr>

			<?php endforeach ?>

		</table>

	</div>

</body>
</html>