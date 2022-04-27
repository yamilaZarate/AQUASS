<?php

require_once "../../class/TipoContacto.php";

$lista = TipoContacto::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

	<script src="/programacion3/gestion_user/js/jquery-3.6.0.min.js"></script>
	<script src="/programacion3/gestion_user/js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="/programacion3/gestion_user/css/jquery.modal.min.css">
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
			
			<div id="boton">
				<a class="btn btn-green" href="nuevo.php">Nuevo tipo contacto+</a>
			</div>
			<br><br>


			<div class="contenedor">

				<table border="1">
					<h3>Listado de tipos de contactos</h3>
					<thead>
						<tr>
							<th>ID Contacto</th>
							<th>Descripcion</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<tbody>

						<?php foreach  ($lista as $tipoContacto): ?>

						<tr>
							
							<td><?php echo $tipoContacto->getIdContacto(); ?></td>
							<td><?php echo $tipoContacto->getDescripcion(); ?></td>
							<td>
							 <a href="modificar.php?id_contacto=<?php echo $tipoContacto->getIdContacto(); ?>"><span class="icon icon-pencil"></span> </a>
									&nbsp;&nbsp;&nbsp;&nbsp; 
							
							 <a href="#ex1" rel="modal:open"><span class="icon icon-bin2"></span></a>
							</td>

						</tr>

						<?php endforeach ?>
					</tbody>

				</table>

	<div id="ex1" class="modal">
	<img src="/programacion3/gestion_user/imagenes/alerta.png" width="50px" height="50px">

	<p>¿Está seguro de que desea eliminar?</p>
	<a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	<!-- en el href de este a, pones el archivo que da de baja el registro -->
	<a class="boton" id="aceptar" href="eliminar.php?id_contacto=<?php echo $tipoContacto->getIdContacto(); ?>">Aceptar</a>								 
	</div>	

</body>
</html>
