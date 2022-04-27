<?php

require_once "../../class/Modulo.php";

$lista = Modulo::obtenerTodos();

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

<a href="nuevo.php">NUEVO MODULO</a>

<br><br>

<table border="1">
	<tr>
		<th>ID Modulo</th>
		<th>Descripcion</th>
		<th>Directorio</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $modulo): ?>

		<tr>
			
			<td><?php echo $modulo->getIdModulo(); ?></td>
			<td><?php echo $modulo->getDescripcion(); ?></td>
			<td><?php echo $modulo->getDirectorio(); ?></td>
			<td>
				<a href="modificar.php?id_modulo=<?php echo $modulo->getIdModulo(); ?>"> Modificar</a>|
				<a href="eliminar.php?id_modulo=<?php echo $modulo->getIdModulo(); ?>"> Eliminar </a>
			</td> 

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>