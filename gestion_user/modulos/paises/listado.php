<?php

require_once "../../class/Pais.php";


$lista = Pais::obtenerTodos();

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

<a href="nuevo.php">NUEVO PAIS</a>

<br>
<br>

<table border="1">
	<tr>
		<th>ID Pais</th>
		<th>Descripcion</th>
		<th>Acciones</th>
	</tr>

	<?php foreach  ($lista as $pais): ?>

		<tr>
			
			<td><?php echo $pais->getIdPais(); ?></td>
			<td><?php echo $pais->getDescripcion(); ?></td>
			<td>
			 <a href="modificar.php?id_pais=<?php echo $pais->getIdPais(); ?>"> Modificar</a> | 
			 <a href="eliminar.php?id_pais=<?php echo $pais->getIdPais(); ?>"> Eliminar </a>
			</td>

		</tr>

	<?php endforeach ?>

</table>

</body>
</html>
