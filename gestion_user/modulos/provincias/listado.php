<?php

require_once "../../class/Provincia.php";


$lista = Provincia::obtenerTodos();

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

<a href="nuevo.php">NUEVA PROVINCIA</a>

<br>
<br>

<table border="1">
	<tr>
		<th>ID Provincia</th>
		<th>Descripcion</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $provincia): ?>

		<tr>
			
			<td><?php echo $provincia->getIdProvincia(); ?></td>
			<td><?php echo $provincia->getDescripcion(); ?></td>
			<td>
			 <a href="modificar.php?id_provincia=<?php echo $provincia->getIdProvincia(); ?>"> Modificar </a> | 
			 <a href="eliminar.php?id_provincia=<?php echo $provincia->getIdProvincia(); ?>"> Eliminar </a>
			</td>


		</tr>

	<?php endforeach ?>

</table>

</body>
</html>
