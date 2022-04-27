<?php

require_once "../../class/Perfil.php";

$lista = Perfil::obtenerTodos();

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

			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>


			<div id="boton">
				<a class="btn btn-green" href="nuevo.php"> Nuevo Perfil +</a>
			</div>
			<br><br>

			<div class="contenedor">
				<table border="1">
					<thead>
						<tr>
							<th>ID Perfil</th>
							<th>Descripcion</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<?php foreach  ($lista as $perfil): ?>
						<tbody>
							<tr>

								<td><?php echo $perfil->getIdPerfil(); ?></td>
								<td><?php echo $perfil->getDescripcion(); ?></td>
								<td>
									<a href="modificar.php?id_perfil=<?php echo $perfil->getIdPerfil(); ?>"><span class="icon icon-pencil"></span> </a>
									&nbsp;&nbsp;&nbsp;&nbsp; 

									<a href="eliminar.php?id_perfil=<?php echo $perfil->getIdPerfil(); ?>"><span class="icon icon-bin2"></span></a>
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
