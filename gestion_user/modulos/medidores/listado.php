<?php

if (isset($_GET["cboFiltroEstado"])){
	$filtroEstado = $_GET["cboFiltroEstado"];
} else {
	$filtroEstado = 1; //Activos
}

require_once "../../class/Medidor.php";
require_once "../../class/MedidorTipoServicio.php";


$lista = Medidor::obtenerTodos($filtroEstado);
$listadoMedidorTipoServicio = MedidorTipoServicio::obtenerTodos();



?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.3.6.js"></script>


	<script src="/programacion3/gestion_user/js/jquery-3.6.0.min.js"></script>
	<script src="/programacion3/gestion_user/js/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="/programacion3/gestion_user/css/jquery.modal.min.css">


	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready( function () {
    		$('#listadoMedidor').DataTable();
		} );
	</script>

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

			<div id="boton">
				<a class="btn btn-green" href="nuevo.php"> Nuevo Medidor +</a>
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
					
					<input type="submit" value="Filtrar">
					<br><br>
				</form>
			</div>



			<div class="contenedor">

				<table border="1" id="listadoMedidor">
					<h3>Listado de Medidores</h3>
					<thead>
						<tr>
							<th>ID Medidor</th>
							<th>Numero</th>
							<th>Cliente</th>
							<th>Categoria</th>
							<th>Tipo de servicio</th>
							<th>Domicilios</th>
							<th>Acciones</th>
						</tr>
					</thead>

						<tbody>
							<?php foreach  ($lista as $medidor): ?>

							<tr>

								<td><?php echo $medidor->getIdMedidor(); ?></td>
								<td><?php echo $medidor->getNumero(); ?></td>
								<td><?php echo $medidor->cliente->getNombre(); 
								echo " "; echo $medidor->cliente->getApellido(); ?></td>
								<td><?php echo $medidor->categoria->getDescripcion(); ?></td>

								<td>
								<?php
								$idMedidor = $medidor->getIdMedidor();
								$listadoServicios = MedidorTipoServicio::obtenerPorIdMedidor($idMedidor);
								foreach($listadoServicios as $Servicio):?>

									<?php echo $Servicio->getDescripcion();?>
									<br><br>

								<?php endforeach;?></td>

								<td>
									<a href="../domicilio/domicilio.php?id_medidor=<?php echo $medidor->getIdMedidor();?>"><span class="icon icon-home2"></span></a> 
								</td>
								<td>

									<a href="modificar.php?id_medidor=<?php echo $medidor->getIdMedidor(); ?>"><span class="icon icon-pencil"></span> </a>
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
	</div>
	<div id="ex1" class="modal">
	<img src="/programacion3/gestion_user/imagenes/alerta.png" width="50px" height="50px">

	<p>¿Está seguro de que desea eliminar?</p>
	<a class="boton" id="cancelar" href="#" rel="modal:close">Cancelar</a>
	<!-- en el href de este a, pones el archivo que da de baja el registro -->
	<a class="boton" id="aceptar" href="eliminar.php?id_medidor=<?php echo $medidor->getIdMedidor(); ?>">Aceptar</a>								 
	</div>	


</body>
</html>