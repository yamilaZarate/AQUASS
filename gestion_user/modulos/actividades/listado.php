<?php

require_once "../../class/Actividad.php";

$lista = Actividad::obtenerTodos();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>AQUAS</title>
		<meta name = "author" content="Zarate Yamila">
		<meta name= "" content = "Autogestion">
		<link rel="stylesheet" type="text/css" href="#">
		<style>
			
		</style> 
	</head>
		<body>
			<header>
				
			</header>
				<?php require_once "../../menu.php"; ?>

			<br><br>

			<nav>
				<a href="nuevo.php">NUEVA ACTIVIDAD</a>
			</nav>

			<div>
			<table border="1">
				<caption>Lista de Actividades</caption>
				<thead>
					<tr>
						<th>ID Actividad</th>
						<th>Descripcion</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<?php foreach  ($lista as $actividad): ?>

				<tbody>
					<tr>
						<td><?php echo $actividad->getIdActividad(); ?></td>
						<td><?php echo $actividad->getDescripcion(); ?></td>
						<td>
						 <a href="modificar.php?id_actividad=<?php echo $actividad->getIdActividad(); ?>"> Modificar </a> | 
						 <a href="eliminar.php?id_actividad=<?php echo $actividad->getIdActividad(); ?>"> Eliminar </a>
						</td>
					</tr>
				</tbody>			
				<?php endforeach ?>

			</table>
		</div>
		</body>
</html>