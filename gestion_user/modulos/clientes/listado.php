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

require_once "../../class/Cliente.php";

if (isset($_GET["cboFiltroEstado"])){
	$filtroEstado = $_GET["cboFiltroEstado"];
} else {
	$filtroEstado = 1; //Activos
}

if (isset($_GET["txtApellido"])) {
	$filtroApellido = $_GET["txtApellido"];
} else {
	$filtroApellido = "";
}
$lista = Cliente::obtenerTodos($filtroEstado, $filtroApellido);

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.3.6.js"></script>
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/jquery.dataTables.min.css">


	<script src="/programacion3/gestion_user/js/jquery-3.6.0.min.js"></script>
	<script src="/programacion3/gestion_user/js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="/programacion3/gestion_user/css/jquery.modal.min.css">
	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.dataTables.min.js"></script>


	<script>
		$(document).ready( function () {
    		$('#listadoCliente').DataTable();
		} );
	</script>

</head>

<body>
		<header>
			<nav>
				<?php require_once "../../menu.php"; ?>
				
			</nav>
		</header>
		<?php

			echo $mensaje;


		?>

		
	<div id="primerContenedor">
		<div id="contenedorgeneral">
			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>

			<div id="boton">
				<a class="btn btn-green" href="nuevo.php"> Nuevo Cliente +</a>
				
			</div>
			<br><br>

			<div>
				<form method= "GET">
					<label>Estado: </label>
					<select name= 'cboFiltroEstado'>
					 	<option value="0">Todos</option>
					 	<option value="1">Activos</option>
					 	<option value="2">Inactivos</option>
					</select>

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<label>Apellido</label>

					<input type="text" name="txtApellido">

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<input type="submit" value="Filtrar">
					<br><br>
				</form>
			</div>

			<div class="contenedor">
				
				<a href="http://localhost/programacion3/gestion_user/modulos/reportes/reporte2.php"><span class="icon-file-pdf"></span></a>

					<table border="1" id="listadoCliente">
						<h3 align="center">Listado de Clientes</h3>
					<thead>
						<tr>
							<th>ID cliente</th>
							<th>Nombre y Apellido</th>
							<th>Dni</th>
							<th>Usuario</th>
							<th>Contacto</th>
							<th>Domicilio</th>
							<th>Acciones</th>
						</tr>
					</thead>

						<tbody>
							<?php foreach  ($lista as $cliente): ?>

							<tr>
								<td><?php echo $cliente->getIdCliente(); ?></td>
								<td><?php echo $cliente->getNombre(); 
								echo " "; echo $cliente->getApellido(); ?></td>
								<td><?php echo $cliente->getDni(); ?></td>
								<td>
									<a href="../usuarios/usuarios.php?id_persona=<?php echo $cliente->getIdPersona(); ?>"><span class="icon-user-check"></span></a>
								</td>

								<td>
									<a href="../contactos/contactos.php?id_persona=<?php echo $cliente->getIdPersona(); ?>"><span class="icon icon-phone"></span></a>
								</td>

								<td>
									<a href="../domicilios/domicilios.php?id_persona=<?php echo $cliente->getIdPersona();?>&modulo=clientes"><span class="icon icon-home2"></span></a>
								</td>
					
								<td>
									<a href="modificar.php?id_cliente=<?php echo $cliente->getIdCliente(); ?>"><span class="icon icon-pencil"></span> </a>
									&nbsp;&nbsp;&nbsp;&nbsp;

									<a href="#ex1" rel="modal:open"><span class="icon icon-bin2"></span></a>

									
								</td>
							</tr>

							<?php endforeach ?>

						</tbody>

				</table>
			</div>
		</div>
	</div>


	<div id="ex1" class="modal">
	<img src="/programacion3/gestion_user/imagenes/alerta.png" width="50px" height="50px">

	<p>¿Está seguro de que desea dar de baja?</p>
	<a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	<!-- en el href de este a, pones el archivo que da de baja el registro -->
	<a class="boton" id="aceptar" href="eliminar.php?id_cliente=<?php echo $cliente->getIdCliente(); ?>">Aceptar</a>								 
	</div>	

</body>
</html>
