<?php

require_once "../../class/Cliente.php";

$lista = Cliente::obtenerTodos();

require_once "../../class/Factura.php";
require_once "../../class/FacturaVencimiento.php";
require_once "../../class/Medidor.php";
require_once "../../class/RegistroMedidor.php";
$listadoRegistroMedidor = RegistroMedidor::obtenerTodos();
require_once "../../class/MedidorTipoServicio.php";
require_once "../../class/Categoria.php";

$listadoCategoria = Categoria::obtenerTodos();
$listadoCliente = Cliente::obtenerTodos();
$lista = Factura::obtenerTodos();
$listadoMedidor = Medidor::obtenerTodos();
$listadoMedidorTipoServicio = MedidorTipoServicio::obtenerTodos();
$listadoEstadoPago = EstadoPago::obtenerTodos();
$listadoPeriodo = Periodo::obtenerTodos();

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
    		$('#listadoFactura').DataTable();
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
				<a class="btn btn-green" href="nuevo.php"> Nueva Factura +</a>
			</div>
			<br><br>

				<table border="1" id="listadoFactura">
					<h3 align="center">Listado de Facturas</h3>
					<thead>
						<tr>
							<th>Cliente</th>
							<th>Numero de Factura</th>
							<th>Fecha de Emision</th>
							<th>Estado de Pago</th>
							<th>Periodo</th>
							<th>Medidor</th>
							<th>1er Vencimiento</th>
							<th>2do Vencimiento</th>
							<th>Detalle Factura</th>
							<th>Acciones</th>
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
						

								<td><?php echo $factura->periodo->getMes();
								echo " "; echo $factura->periodo->getAnio(); ?></td>
								<td><?php echo $factura->medidor->getNumero(); ?></td>
								<td><?php echo $factura->getPrimerVencimiento(); ?></td>
								<td><?php echo $factura->getSegundoVencimiento(); ?></td>
								<td>
									<a href="detalle.php?id_factura=<?php echo $factura->getIdFactura(); ?>"> <span class="icon icon-file-text2"></span></a>
								</td>
								<td>
									<a href="modificar.php?id_factura=<?php echo $factura->getIdFactura(); ?>"><span class="icon icon-pencil"></span> </a>
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
	<a class="boton" id="aceptar" href="eliminar.php?id_factura=<?php echo $factura->getIdFactura(); ?>">Aceptar</a>								 
	</div>		

	
</body>
</html>
