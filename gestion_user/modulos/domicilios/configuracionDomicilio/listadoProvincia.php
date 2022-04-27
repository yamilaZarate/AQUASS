<?php

$mensaje = "";

if (isset($_GET["validacion"])) {
	// code...
	switch ($_GET["validacion"]) {

	case 'true':
		$mensaje = "<div class='correcto' align='center'>"."Datos Cargados Correctamente"."</div>";
		break; 

	case 'eliminado':
		$mensaje = "<div class='correcto' align='center'>"."Datos Eliminados Correctamente"."</div>";
		break; 	
	}
}


?>


<?php

require_once "../../../class/provincia.php";
$id_pais = $_GET["id_pais"];

$lista = provincia::obtenerPorIdPais($id_pais);

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
				<a class="btn btn-green" href="nuevo.php"> Añadir Provincia+</a>
				
			</div>
			<br><br>

		<table border="1">
			<h3 align="center">Listado de Paises</h3>
			<thead>
			<tr>
				<th>ID Provincia</th>
				<th>NOMBRE</th>
				<th>Localidades</th>
				<th>Modificar</th>
				<th>Eliminar</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach  ($lista as $provincia): ?>
				<tr>
			
					<td><?php echo $provincia->getIdProvincia(); ?></td>
					<td><?php echo $provincia->getDescripcion(); ?></td>
					<td><a href="listadoLocalidad.php?id_provincia=<?php echo $provincia->getIdProvincia(); ?>" class="btn-bootstrap1">Localidades</a></td>
					<td><a href="modificarProvincia.php?id_pais=<?php echo $id_pais ?>&id_provincia=<?php echo $provincia->getIdProvincia(); ?>" class="btn-bootstrap1"><span class="icon icon-pencil"><span class="icon icon-pencil"></span> </a>
					<td><a href="eliminarProvincia.php?id_pais=<?php echo $id_pais ?>&id_provincia=<?php echo $provincia->getIdProvincia(); ?>" class="btn-bootstrap2"><span class="icon icon-bin2"></span></a>	
				</tr>

				<?php endforeach ?>
				
			</tbody>
		

	</table>
	</div>
	</div>

</body>
</html>
