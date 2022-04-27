<?php

require_once "../../class/Barrio.php";


$lista = Barrio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
</head>
<body>

<?php require_once "../../menu.php"; ?>

<br>
<br>

<a href="nuevo.php">NUEVO BARRIO</a>

<br>
<br>

<table border="1">
	<tr>
		<th>ID Barrio</th>
		<th>Descripcion</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $barrio): ?>

		<tr>
			
			<td><?php echo $barrio->getIdBarrio(); ?></td>
			<td><?php echo $barrio->getDescripcion(); ?></td>
			<td>
			 <a href="modificar.php?id_barrio=<?php echo $barrio->getIdBarrio(); ?>"> Modificar </a> | 
			 <a href="eliminar.php?id_barrio=<?php echo $barrio->getIdBarrio(); ?>"> Eliminar </a>
			</td>


		</tr>

	<?php endforeach ?>

</table>

</body>
</html>
