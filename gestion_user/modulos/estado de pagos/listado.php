<?php

require_once "../../class/EstadoPago.php";


$lista = EstadoPago::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.3.6.js"></script>
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/jquery.dataTables.min.css">


	<script src="/programacion3/gestion_user/js/jquery-3.6.0.min.js"></script>
	<script src="/programacion3/gestion_user/js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="/programacion3/gestion_user/css/jquery.modal.min.css">
	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.dataTables.min.js"></script>
</head>
<body>

<header>
			<nav>
				<?php require_once "../../menu.php"; ?>
				
			</nav>
		</header>
<br>

	<div id="primerContenedor">
		<div id="contenedorgeneral">
			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>

			<div id="boton">
				<a class="btn btn-green" href="nuevo.php"> Nuevo Estado+</a>
				
			</div>
			<br><br>


		<table border="1">
			<h3 align="center">Listado de Estados de pagos</h3>
			<thead>
				<tr>
					<th>ID Estado Pago</th>
					<th>Descripcion</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody>

				<?php foreach  ($lista as $estadoPago): ?>

				<tr>
					
					<td><?php echo $estadoPago->getIdEstadoPago(); ?></td>
					<td><?php echo $estadoPago->getDescripcion(); ?></td>
					<td>
					 <a href="modificar.php?id_estado_pago=<?php echo $estadoPago->getIdEstadoPago(); ?>"><span class="icon icon-pencil"></span> </a>
						&nbsp;&nbsp;&nbsp;&nbsp; 
					 <a href="#ex1" rel="modal:open"><span class="icon icon-bin2"></span></a>
					</td>
				</tr>
				<?php endforeach ?>

			</tbody>
		</table>

	<div id="ex1" class="modal">
	<img src="/programacion3/gestion_user/imagenes/alerta.png" width="50px" height="50px">

	<p>¿Está seguro de que desea Eliminar?</p>
	<a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	<!-- en el href de este a, pones el archivo que da de baja el registro -->
	<a class="boton" id="aceptar" href="eliminar.php?id_estado_pago=<?php echo $estadoPago->getIdEstadoPago(); ?>">Aceptar</a>								 
	</div>	

</body>
</html>
