<?php

require_once "../../class/RegistroMedidor.php";


$lista = RegistroMedidor::obtenerTodos();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.3.6.js"></script>

	<script src="/programacion3/gestion_user/js/jquery-3.6.0.min.js"></script>
	<script src="/programacion3/gestion_user/js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="/programacion3/gestion_user/css/jquery.modal.min.css">
	
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


			<div id="boton">
				<a class="btn btn-green" href="nuevo.php"> Nuevo Registro +</a>
			</div>
			<br><br>
			<div class="contenedor">

				<table border="1" id="listado">
					<h3>Listado de Registros</h3>
					<thead>
						<tr>
							<th>ID</th>
							<th>Medidor</th>
							<th>Fecha</th>
							<th>Empleado</th>
							<th>Lectura Actual</th>
							<th>Consumo</th>
							<th>Acciones</th>
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
								

								<td>
									<a href="modificar.php?id_registro_medidor=<?php echo $registroMedidor->getIdRegistroMedidor(); ?>"><span class="icon icon-pencil"></span> </a>
									&nbsp;&nbsp;&nbsp;&nbsp; 

									<a href="#ex1" rel="modal:open"><span class="icon icon-bin2"></span></a> 
								</td>

							</tr>
						<?php endforeach ?>

					</tbody>

				</table>
			</div>
		</div>
	</div>

	</div>
	<div id="ex1" class="modal">
	<img src="/programacion3/gestion_user/imagenes/alerta.png" width="50px" height="50px">

	<p>¿Está seguro de que desea eliminar?</p>
	<a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	<!-- en el href de este a, pones el archivo que da de baja el registro -->
	<a class="boton" id="aceptar" href="eliminar.php?id_registro_medidor=<?php echo $registroMedidor->getIdRegistroMedidor(); ?>">Aceptar</a>								 
	</div>	


</body>
</html>
