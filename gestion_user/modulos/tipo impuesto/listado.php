<?php

require_once "../../class/TipoImpuesto.php";

$lista = TipoImpuesto::obtenerTodos();

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

<a href="nuevo.php">NUEVO IMPUESTO</a>

<br>
<br>

<table border="1">
	<tr>
		<th>ID Impuesto</th>
		<th>Descripcion</th>
		<th>Porcentaje</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $tipoImpuesto): ?>

		<tr>
			
			<td><?php echo $tipoImpuesto->getIdImpuesto(); ?></td>
			<td><?php echo $tipoImpuesto->getDescripcion(); ?></td>
			<td><?php echo $tipoImpuesto->getPorcentaje(); ?></td>
			<td>
				<a href="modificar.php?id_impuesto=<?php echo $tipoImpuesto->getIdImpuesto(); ?>"> Modificar </a> | 
			 	<a href="eliminar.php?id_impuesto=<?php echo $tipoImpuesto->getIdImpuesto(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>