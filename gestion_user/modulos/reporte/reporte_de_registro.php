<?php

require_once "../../class/RegistroMedidor.php";

$lista = RegistroMedidor::obtenerTodos();

	if (isset($_GET['txtFechaDesde']) and isset($_GET['txtFechaHasta'])) {

		$desde = $_GET['txtFechaDesde'];
		$hasta = $_GET['txtFechaHasta'];
		$lista = RegistroMedidor::obtenerPorFecha($desde, $hasta);
		//highlight_string(var_export($listaFecha,true));
		//exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.3.6.js"></script>
	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready( function () {
    		$('#listado').DataTable();
		} );
	</script>
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
		<h2 align="center">Registros</h2>
		<br>

		<form align="center" method="GET">
			Desde: <input type="date" name="txtFechaDesde" required="required">

			&nbsp;&nbsp;&nbsp;&nbsp;

			Hasta: <input type="date" name="txtFechaHasta" required="required">

			&nbsp;&nbsp;&nbsp;&nbsp;

			<button type="submit">Filtrar</button>
		</form>

		<br>


			<div class="contenedor">
				<table border="1" id="listado">
					<thead>
						<tr>
							<th>ID</th>
							<th>Medidor</th>
							<th>Fecha</th>
							<th>Empleado</th>
							<th>Lectura Actual</th>
							<th>Consumo</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach  ($lista as $registroMedidor): ?>

							<tr>
								<td><?php echo $registroMedidor->getIdRegistroMedidor(); ?></td>
								<td><?php echo $registroMedidor->medidor->getNumero(); ?></td>
								<td><?php echo $registroMedidor->getFecha(); ?></td>
								<td><?php echo $registroMedidor->empleado->getNombre();
								echo " "; echo $registroMedidor->empleado->getApellido();?></td>

								<td><?php echo $registroMedidor->getLecturaActual(); ?></td>
								<td><?php echo $registroMedidor->getConsumo(); ?></td>

							</tr>
						<?php endforeach ?>

					</tbody>

				</table>
			</div>
		</div>
	</div>

</body>
</html>
