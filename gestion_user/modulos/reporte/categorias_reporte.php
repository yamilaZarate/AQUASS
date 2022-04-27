<?php

require_once "../../class/Medidor.php";
require_once "../../class/MedidorTipoServicio.php";



if (isset($_GET["cboFiltroCategoria"])){
	$filtroCategoria = $_GET["cboFiltroCategoria"];
} else {
	$filtroCategoria = 1; //residencial
}

$lista = Medidor::obtenerTodosC($filtroCategoria);
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


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script type="text/javascript" src="/programacion3/gestion_user/js/jquery.dataTables.min.js"></script>

	<script>
		$(document).ready(() => {
			$('#imprimir').click(function(){
				$.print ('#imprimible');
			});
		});

	</script>

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
			<br><br>


			<form method="GET">
				<label>Categoria</label>
				<select name='cboFiltroCategoria'>
					<option value="0">Todos</option>
					<option value="1">Residencial</option>
					<option value="2">Industrial</option>
				</select>
				&nbsp;&nbsp;&nbsp;&nbsp;

				<input type="submit" value="Filtrar">
			</form>
			<br><br>


			<button id="imprimir"class="icon-file-pdf"> Imprimir</button>
			
			<div id="imprimible">
				<h2 align="center">Reporte de Categorias</h2>
				<table border="1" id="listadoMedidor">
					<thead>
						<tr>
							<th>Numero de medidor</th>
							<th>Cliente</th>
							<th>Categoria</th>
							<th>Tipo de servicio</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach  ($lista as $medidor): ?>

							<tr>
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

									</tr>
								<?php endforeach ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


</body>
</html>