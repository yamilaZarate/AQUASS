<?php
require_once "../../class/PersonaDomicilio.php";
require_once "../../class/Empleado.php";
require_once "../../class/Barrio.php";
require_once "../../class/Localidad.php";
require_once "../../class/Provincia.php";

$listadoProvincia = Provincia::obtenerTodos();
$listadoLocalidad = Localidad::obtenerTodos();
$listadoBarrio = Barrio::obtenerTodos();

$idPersona = $_GET['id_persona'];
$modulo = $_GET['modulo'];

switch ($modulo) {

	case 'empleados':
		$persona = Empleado::obtenerPorIdPersona($idPersona);
		break;

	case 'clientes':
		// $persona = Cliente::obtenerPorIdPersona($idPersona);
	    echo "viene de clientes";
	    exit;
		break;
	
	default:
		echo "Modulo no valido";
		exit;

}


$listadoDomicilios = PersonaDomicilio::obtenerPorIdPersona($idPersona);

//highlight_string(var_export($listadoDomicilios, true));

?>
<!DOCTYPE html>
<html>
<head>
	<title>Domicilios</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
</head>
<body>
	<header>
		<nav>
			<?php require_once "../../menu.php"; ?>
		</nav>
	</header>

	<div id="nuevo">
		<a href="nuevo.php">NUEVO DOMICILIO</a>
	</div>
		<h2 style="color:#FFFFFF"><?php echo $persona; ?></h2>

	<div id="main-container">
		<table>
			<thead>
				<tr>
					<th>Calle</th>
					<th>Altura</th>
					<th>Manzana</th>
					<th>Número Casa</th>
					<th>Torre</th>
					<th>Piso</th>
					<th>Barrio</th>
					<th>Localidad</th>
					<th>Provincia</th>
					<th>Pais</th>
					<th>Accion</th>
				</tr>
			</thead>

			<?php foreach  ($listadoDomicilios as $domicilio): ?>
			<tbody>
				<tr>
					<td><?php echo $domicilio->getCalle(); ?></td>
					<td><?php echo $domicilio->getAltura(); ?></td>
					<td><?php echo $domicilio->getManzana(); ?></td>
					<td><?php echo $domicilio->getNumeroCasa(); ?></td>
					<td><?php echo $domicilio->getTorre(); ?></td>
					<td><?php echo $domicilio->getPiso(); ?></td>
					<td><?php echo $domicilio->barrio->getDescripcion(); ?></td>
					<td><?php echo $domicilio->barrio->localidad->getDescripcion(); ?></td>
					<td><?php echo $domicilio->barrio->localidad->provincia->getDescripcion(); ?></td>
					<td><?php echo $domicilio->barrio->localidad->provincia->pais->getDescripcion(); ?></td>
					<td>
						Eliminar | Modificar
					</td>
				</tr>
			</tbody>
			<?php endforeach ?>

		</table>
	</div>

</body>
</html>
