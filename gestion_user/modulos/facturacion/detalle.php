<?php
require_once "../../class/Factura.php";
$idFactura = $_GET['id_factura'];

$lista = Factura::obtenerPorIdFactura($idFactura);

//highlight_string(var_export($lista, true));
//exit;


require_once "../../class/Medidor.php";
require_once "../../class/RegistroMedidor.php";
$listadoRegistroMedidor = RegistroMedidor::obtenerTodos();
require_once "../../class/Categoria.php";

$listadoCategoria = Categoria::obtenerTodos();
$listadoCliente = Cliente::obtenerTodos();
//$lista = Factura::obtenerPorId($idFactura);
//$lista = Factura::obtenerTodos();
$listadoMedidor = Medidor::obtenerTodos();
$listadoMedidorTipoServicio = MedidorTipoServicio::obtenerTodos();

$listadoEstadoPago = EstadoPago::obtenerTodos();
$listadoPeriodo = Periodo::obtenerTodos();

const RECARGO = 0.01;
const RECARGOCANON = 0.05;
const RECARGOIVA = 0.27;
?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
				<button id="volver" type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>

			<button id="imprimir"class="icon-file-pdf"> Imprimir</button>

			<div id="mitabla">
				<div id="imprimible">

					<table border="1">
						<caption id="caption">Mi Factura</caption>
						<thead>
							<tr>
								<th colspan="4" align="center">Nro Factura</th>
							</tr>
						</thead>
						<?php foreach  ($lista as $factura): ?>

							<tbody>
								<tr>
									<td colspan="4" align="center"><?php echo $factura->getNumero(); ?></td>
								</tr>
							</tbody>
						<?php endforeach ?>

						<thead>
							<tr>
								<th>Fecha Emision</th>
								<th>Periodo</th>
								<th>1er Vencimiento</th>
								<th>2do Vencimiento</th>
							</tr>
						</thead>
						<?php foreach  ($lista as $factura): ?>

							<tbody>
								<tr>
									<td><?php echo $factura->getFechaEmision(); ?></td>
									<td><?php echo $factura->periodo->getMes();
									echo " "; echo $factura->periodo->getAnio(); ?></td></td>
									<td><?php echo $factura->getPrimerVencimiento(); ?></td>
									<td><?php echo $factura->getSegundoVencimiento(); ?></td>
								</tr>
							</tbody>
						<?php endforeach ?>

						<thead>
							<tr>
								<th colspan="4" align="center">DATOS DEL CLIENTE</th>
							</tr>

							<tr>
								<th>Factura de</th>
								<th colspan="2">Propietario</th>
								<th>Categoria</th>
							</tr>
						</thead>
						<?php foreach  ($lista as $factura): ?>
							<tbody>
								<tr>
									<td>Servicio</td>
									<td colspan="2">
										<?php echo $factura->medidor->cliente->getNombre();
										echo " "; echo $factura->medidor->cliente->getApellido(); ?></td>
										<td><?php echo $factura->medidor->categoria->getDescripcion(); ?></td>
									</tr>
								</tbody>
							<?php endforeach ?>
							<thead>
								<tr>
									<th colspan="4" align="center">DATOS PARA SERVICIO MEDIDO</th>
								</tr>
								<tr>
									<th align="center">Nro Medidor</th>
									<th colspan="2" align="center">Lectura Actual</th>
									<th align="center">Consumo</th>
								</tr>
							</thead>
							<?php foreach  ($lista as $factura): ?>

								<tbody>
									<tr>
										<td align="center"><?php echo $factura->medidor->getNumero(); ?></td>
										<td colspan="2" align="center"><?php echo $factura->registroMedidor->getLecturaActual(); ?></td>
										<td align="center"><?php echo $factura->registroMedidor->getConsumo();?></td>
									</tr>
								</tbody>
							<?php endforeach ?>
							<thead>
								<tr>
									<th colspan="4" align="center">DETALLES DE SERVICIOS</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="4">
										<?php
										$idMedidor =  $factura->medidor->getIdMedidor();
										$listadoServicios = MedidorTipoServicio::obtenerPorIdMedidor($idMedidor);
										foreach($listadoServicios as $Servicio):?>

											<?php echo $Servicio->getDescripcion();?>
											<br><br>

											Cargo fijo: $<?php $cargoFijo= $Servicio->getCargoFijo();
											echo $cargoFijo;?>
											<br><br>

											Cargo Variable:$<?php 
											$cargoVariable= $Servicio->getCargoVariable();
											echo $cargoVariable;?>
											<br><br>

										<?php endforeach;?>

										Canon:$<?php
										$canon= $factura->getCanon();
										$canon= ($cargoFijo + $cargoVariable) * RECARGOCANON;

										echo $canon; ?>
										<br><br>
										Iva:$<?php
										$iva= $factura->getIva();

										$iva= ($cargoFijo + $cargoVariable) * RECARGOIVA;
										echo $iva; ?>

										<br><br>
									</td>
								</tr>
							</tbody>

							<thead>
								<tr>
									<th colspan="4" align="center">TOTAL A PAGAR</th>
								</tr>
							</thead>
							<thead>
								<tr>
									<th colspan="2" align="center">Hasta 1er Vencimiento</th>
									<th colspan="2" align="center">Hasta 2do Vencimiento</th>
								</tr>
							</thead>
							<?php foreach  ($lista as $factura): ?>
								<tbody>
									<tr>
										<td colspan="2" align="center"> 
											$<?php $total1erVencimiento= $canon + $iva + $cargoFijo + $cargoVariable;
											echo $total1erVencimiento; ?>
										</td>		

										<td colspan="2" align="center">										
											$<?php $porcentaje= $total1erVencimiento * RECARGO;

											$total2doVencimiento= $total1erVencimiento + $porcentaje;
											echo $total2doVencimiento; ?>

										</td>

									</tr>
								</tbody>
							<?php endforeach ?>
						</table>
					</div>

				</div>
			</div>
		</div>

</boby>
</html>