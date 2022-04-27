<?php

require_once "../../class/Usuario.php";
$idPersona = $_GET['id_persona'];

$lista = Usuario::obtenerPorIdPersona($idPersona);

//$lista = Usuario::obtenerTodos();

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


<?php
	if (empty($lista)){

?>

			<div id="boton">
				<a class="btn btn-green" href="nuevo.php?id_persona=<?php echo $idPersona;?>"> Nuevo Usuario +</a>
			</div>
			<?php

			}?>
			<br><br>

			<div class="contenedor">

				<table border="1">
					<h3></h3>
					<thead>

						<tr>
							<th>ID Usuario</th>
							<th>Username</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<?php foreach  ($lista as $usuario2): ?>
						<tbody>
							<tr>
								
								<td><?php echo $usuario2->getIdUsuario(); ?></td>
								<td><?php echo $usuario2->getUsername(); ?></td>
								<td>

									<a href="modificar.php?id_usuario=<?php echo $usuario2->getIdUsuario(); ?>&id_persona=<?php echo $idPersona?>"><span class="icon icon-pencil"></span> </a>
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