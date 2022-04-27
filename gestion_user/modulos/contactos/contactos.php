<?php

require_once "../../class/Contacto.php";
require_once "../../class/TipoContacto.php";

$idPersona = $_GET['id_persona'];

$listaContactos = Contacto::obtenerPorIdPersona($idPersona);

$listadoTipoContactos= TipoContacto::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
</head>
<body>
	<header>
		<nav>
			<?php require_once "../../menu.php"; ?>
		</nav>
	</header>


	<div id="primerContenedor">
		<div id="contenedorgeneral">
			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>
			<br><br>

		<form align="center" method="POST" action="procesar_alta.php">

			<input type="hidden" name="txtIdPersona" value="<?php echo $idPersona; ?>"required== $0>

			<label>Tipo Contacto</label>
			<select name="cboTipoContacto">
				<option value=0>-- Seleccionar --</option>

				<?php foreach ($listadoTipoContactos as $tipoContacto): ?>

					<option value="<?php echo $tipoContacto->getIdContacto(); ?>">
						<?php echo $tipoContacto->getDescripcion(); ?>
					</option>
					
				<?php endforeach ?>

			</select>

			
			&nbsp;&nbsp;&nbsp;&nbsp;

			<label>Valor</label>
			<input type="text" name="txtValor">
			
			&nbsp;&nbsp;&nbsp;

			<button type="submit" class="guardar">Agregar</button>


		</form>
		<br><br>
	
		<table border="1">
			<h3 align="center">Listados de Tipos de contactos</h3>
			<thead>
				<tr>
					<th>Descripcion</th>
					<th>Valor</th>
					<th>Accion</th>
				</tr>
			</thead>

			<?php foreach  ($listaContactos as $contacto): ?>
			<tbody>
				<tr>
					
					<td><?php echo $contacto->getDescripcion(); ?></td>
					<td><?php echo $contacto->getValor(); ?></td>
					<td>
						<a href="eliminar.php?idPersonaContacto=<?php echo $contacto->getIdPersonaContacto(); ?>&id_persona=<?php echo $contacto->getIdPersona(); ?>"><span class="icon icon-bin2"></span></a>
						
					</td>
				 </tr>
			</tbody>

			<?php endforeach ?>

		</table>
	</div>

</body>
</html>