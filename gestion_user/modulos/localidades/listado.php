<?php

require_once "../../class/Localidad.php";


$lista = Localidad::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php require_once "../../menu.php"; ?>

<br>
<br>

<a href="nuevo.php">NUEVA LOCALIDAD</a>

<br>
<br>

<table border="1">
	<tr>
		<th>ID Localidad</th>
		<th>Descripcion</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $localidad): ?>

		<tr>
			
			<td><?php echo $localidad->getIdLocalidad(); ?></td>
			<td><?php echo $localidad->getDescripcion(); ?></td>
			<td>
			 <a href="modificar.php?id_localidad=<?php echo $localidad->getIdLocalidad(); ?>"> Modificar </a> | 
			 <a href="eliminar.php?id_localidad=<?php echo $localidad->getIdLocalidad(); ?>"> Eliminar </a>
			</td>


		</tr>

	<?php endforeach ?>

</table>

</body>
</html>
