<?php

$mensaje = "";

if (isset($_GET["validacion"])) {
	// code...
	switch ($_GET["validacion"]) {

	case 'true':
		$mensaje = "<div class='correcto' align='center'>"."Datos Cargados Correctamente"."</div>";
		break; 
	}
}


?>


<?php

require_once "../../../class/localidad.php";
$id_provincia = $_GET["id_provincia"];

$lista = Localidad::obtenerPorIdProvincia($id_provincia);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<link rel="stylesheet" href="../../../css/tabla.css">

	<link rel="stylesheet" href="../../../css/botonAñadir.css">
	<link rel="stylesheet" href="../../../css/botonModificar.css">
	<link rel="stylesheet" href="../../../css/botonEliminar.css">
	<style>

		.correcto{
			background-color: #A0DEA7;
			font-size: 12px;
			padding: 10px;
		}
	</style>
</head>
<body>
	<?php

		echo $mensaje;

	?>
	<header>
		<nav>
			<?php require_once "../../../menu.php"; ?>
		</nav>
	</header>

	<div id="primerContenedor">
		<div id="contenedorgeneral">
			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>

			<div id="boton">
				<a class="btn btn-green" href="nuevo.php"> Añadir Localidad+</a>
				
			</div>
			<br><br>
		<table border="1">
			<h3 align="center">Listado de localidades</h3>
		<thead>
		<tr>
			<th>ID Localidad</th>
			<th>NOMBRE</th>
			<th>Barrios</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach  ($lista as $localidad): ?>

			<tr>
				
				<td><?php echo $localidad->getIdLocalidad(); ?></td>
				<td><?php echo $localidad->getDescripcion(); ?></td>
				<td><a href="listadoBarrio.php?id_localidad=<?php echo $localidad->getIdLocalidad(); ?>" class="btn-bootstrap1">Barrios</a></td>
				<td><a href="modificarLocalidad.php?id_provincia=<?php echo $id_provincia ?>&id_localidad=<?php echo $localidad->getIdLocalidad(); ?>" class="btn-bootstrap1"><span class="icon icon-pencil"></span> </a>
				<td><a href="eliminarLocalidad.php?id_provincia=<?php echo $id_provincia ?>&id_localidad=<?php echo $localidad->getIdLocalidad(); ?>" class="btn-bootstrap2"><span class="icon icon-bin2"></span></a>

			</tr>

			<?php endforeach ?>
		</tbody>
	

	</table>
	</div>
</body>
</html>
