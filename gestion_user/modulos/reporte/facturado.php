<?php
require_once "../../class/Factura.php";

if (isset($_GET["cboFiltroEstado"])){
	$filtroEstado = $_GET["cboFiltroEstado"];
} else {
	$filtroEstado = 1; //PAGADOS
}

if (isset($_GET["txtFechaDeEmision"])) {
	$filtroFecha = $_GET["txtFechaDeEmision"];
} else {
	$filtroFecha = "";
}


$lista = Factura::obtenerTodos($filtroEstado);


	if (isset($_GET['txtFechaDesde']) and isset($_GET['txtFechaHasta'])) {

		$desde = $_GET['txtFechaDesde'];
		$hasta = $_GET['txtFechaHasta'];
		$lista = Factura::obtenerPorFecha($desde, $hasta);
		//highlight_string(var_export($listaFecha,true));
		//exit();
	}


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
		$(document).ready( function () {
    		$('#listadoFactura').DataTable();
		} );
	</script>

	<script>
		$(document).ready(() => {
			$('#imprimir').click(function(){
				$.print ('#imprimible');
			});
		});

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
			<label>Estado de Pago</label>
			<select name='cboFiltroEstado'>
				<option value="0">Todos</option>
				<option value="1">Pagado</option>
				<option value="2">No Pagado</option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="submit">Filtrar</button>

		</form>

		<form align="center" method="GET">
			Desde: <input type="date" name="txtFechaDesde" required="required">

			&nbsp;&nbsp;&nbsp;&nbsp;

			Hasta: <input type="date" name="txtFechaHasta" required="required">

			&nbsp;&nbsp;&nbsp;&nbsp;

			<button type="submit">Filtrar</button>
		</form>


		<button id="imprimir"class="icon-file-pdf"> Imprimir</button>
			
			<div id="imprimible">
				<h2 align="center">Facturas</h2>
				<table border="1" id="listadoFactura">
					<thead>
						<tr>
							<th>Cliente</th>
							<th>Numero de factura</th>
							<th>Fecha de Emision</th>
							<th>Estado de Pago</th>
							<th>Periodo</th>
							<th>Numero de medidor</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach  ($lista as $factura): ?>
							<tr>
								<td><?php echo $factura->medidor->cliente->getNombre();
								echo " "; echo $factura->medidor->cliente->getApellido(); ?></td>
								<td><?php echo $factura->getNumero(); ?></td>
								<td><?php echo $factura->getFechaEmision(); ?></td>

								<?php if ($factura->estadoPago->getDescripcion()=="Pagado") {
									$estilo= "color: #33A424; font-weight:bold;";
								}else {
									$estilo= "color: #EE3D2B; font-weight:bold;";
								}
								?>

								<td style="<?php echo $estilo;?>"><?php echo $factura->estadoPago->getDescripcion(); ?></td>
						

								<td><?php echo $factura->periodo->getMes();echo " "; echo $factura->periodo->getAnio(); ?></td>
								<td><?php echo $factura->medidor->getNumero(); ?></td>
							
							</tr>
							<?php endforeach ?>

						</tbody>

				</table>
			</div>
		</div>
	</div>

</body>
</html>
