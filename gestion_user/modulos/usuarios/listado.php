<?php


require_once "../../class/Usuario.php";

$lista = Usuario::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
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
				<a class="btn btn-green" href="nuevo.php"> Nuevo Usuario +</a>
			</div>
			<br><br>

			<div class="contenedor">

				<table border="1">
					<h3>Listado de Usuarios</h3>
					<thead>

						<tr>
							<th>ID Usuario</th>
							<th>Username</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Fecha Nacimiento</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<?php foreach  ($lista as $usuario): ?>
						<tbody>
							<tr>
								
								<td><?php echo $usuario->getIdUsuario(); ?></td>
								<td><?php echo $usuario->getUsername(); ?></td>
								<td><?php echo $usuario->getNombre(); ?></td>
								<td><?php echo $usuario->getApellido(); ?></td>
								<td><?php echo $usuario->getFechaNacimiento(); ?></td>
								<td>

									<a href="modificar.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>"><span class="icon icon-pencil"></span> </a>
									&nbsp;&nbsp;&nbsp;&nbsp;

									<a href="#ex1" rel="modal:open"><span class="icon icon-bin2"></span></a>
								</td>

							</tr>
						</tbody>

					<?php endforeach ?>

				</table>
			</div>
		</div>
	</div>
	<div id="ex1" class="modal">
	<img src="/programacion3/gestion_user/imagenes/alerta.png" width="50px" height="50px">

	<p>¿Está seguro de que desea eliminar?</p>
	<a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	<!-- en el href de este a, pones el archivo que da de baja el registro -->
	<a class="boton" id="aceptar" href="eliminar.php?id_usuario=<?php echo $usuario->getIdUsuario(); ?>">Aceptar</a>								 
	</div>		
</body>
</html>