<?php

require_once "../../class/Factura.php";
require_once "../../class/Medidor.php";
require_once "../../class/Periodo.php";
require_once "../../class/EstadoPago.php";


$listadoMedidor = Medidor::obtenerTodos();
$listadoPeriodo = Periodo::obtenerTodos();
$listadoEstadoPago = EstadoPago::obtenerTodos();
$lista = Factura::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
</head>
<body>
	<header>
		<nav>
			<?php require_once "../../menu.php"; ?>
			
		</nav>
	</header>

	<div id="nuevo">
		<a href="nuevo.php">NUEVO REGISTRO</a>
	</div>


		<div id="main-container">
			<table>
				<thead>
					<tr>
						<th>ID Factura</th>
						<th>Cliente</th>
						<th>Numero de Factura</th>
						<th>Fecha de Emision</th>
						<th>Periodo</th>
						<th>Medidor</th>
						<th>Estado de Pago</th>	
						<th>Acciones</th>
					</tr>
				</thead>

					<?php foreach  ($lista as $factura): ?>
				<tbody>
					<tr>
						<td><?php echo $factura->getIdFactura(); ?></td>
						<td><?php echo $factura->medidor->getIdCliente(); ?></td>
						<td><?php echo $factura->getNumero(); ?></td>
						<td><?php echo $factura->getFechaEmision(); ?></td>
						<td><?php echo $factura->periodo->getFecha(); ?></td>
						<td><?php echo $factura->medidor->getNumero(); ?></td>
						<td><?php echo $factura->estadoPago->getDescripcion(); ?></td>

						<td>
						 <a href="modificar.php?id_factura=<?php echo $factura->getIdFactura(); ?>"> Modificar </a> | 
						 <a id="eliminar" href="eliminar.php?id_factura=<?php echo $factura->getIdFactura(); ?>"> Eliminar </a>
						</td>
					</tr>
				</tbody>

					<?php endforeach ?>

			</table>
		</div>

</body>
</html>
