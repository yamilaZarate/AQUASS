<?php

require_once "../../class/RegistroMedidor.php";

$idRegistroMedidor = $_GET['idRegistroMedidor'];

$lista = RegistroMedidor::obtenerPorId($idRegistroMedidor);


//$lista = Usuario::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

</head>
<body>
	<header>
		<nav>
			<?php require_once "../../menu.php"; ?>
			
		</nav>
	</header>
	<div id="primerContenedor">
		<div id="contenedorgeneral">


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
					<h3>Listado de Usuarios</h3>
					<thead>

						<tr>
							<th>ID Usuario</th>
							<th>Username</th>
							<th>Password</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<?php foreach  ($lista as $usuario2): ?>
						<tbody>
							<tr>
								
								<td><?php echo $usuario2->getIdUsuario(); ?></td>
								<td><?php echo $usuario2->getUsername(); ?></td>
								<td><?php echo $usuario2->getPassword(); ?></td>
								<td>

									<a href="modificar.php?id_usuario=<?php echo $usuario2->getIdUsuario(); ?>&id_persona=<?php echo $idPersona?>"><span class="icon icon-pencil"></span> </a>
									&nbsp;&nbsp;&nbsp;&nbsp;
									
									<a href="eliminar.php?id_usuario=<?php echo $usuario2->getIdUsuario(); ?>"><span class="icon icon-bin2"></span></a>
								</td>

							</tr>
						</tbody>

					<?php endforeach ?>

				</table>
			</div>
		</div>
	</div>

</body>
</html>