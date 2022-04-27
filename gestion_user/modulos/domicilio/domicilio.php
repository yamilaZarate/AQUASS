<?php

require_once "../../class/MedidorDomicilio.php";
require_once "../../class/Medidor.php";
require_once "../../class/Domicilio.php";
require_once "../../class/Barrio.php";
require_once "../../class/Localidad.php";
require_once "../../class/Provincia.php";
require_once "../../class/Pais.php";

$listadoProvincia = Provincia::obtenerTodos();
$listadoLocalidad = Localidad::obtenerTodos();
$listadoBarrio = Barrio::obtenerTodos();
$listadoPais = Pais::obtenerTodos();

$idMedidor = $_GET['id_medidor'];

$listadoDomicilios = MedidorDomicilio::obtenerPorIdMedidor($idMedidor);

//highlight_string(var_export($listadoDomicilios, true));
///exit;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Domicilios</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">


	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script src="jquery.js"></script>
	<link rel="stylesheet" href="../../css/tabla.css">

	<link rel="stylesheet" href="../../css/botonAñadir.css">
	<link rel="stylesheet" href="../../css/botonModificar.css">
	<link rel="stylesheet" href="../../css/botonEliminar.css">
	
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

<?php
	if (empty($listadoDomicilios)){

?>
			<a class="btn btn-green" href="configuracionDomicilio/listado.php">Configuracion Domicilios</a>
			<form align="center" method="POST" action="procesar_alta.php">
				<input type="hidden" name="txtIdMedidor" value="<?php echo $idMedidor; ?>">

				<div>
					<h2 align="center">Formulario Añadir <span>Domicilio</span></h2>
				</div>
				
				<div>
					<div>
						<label style="color:black;font-weight: bold;">Pais</label>
						<select id="lista1" name="lista1">
							<option value='0'>-- SELECCIONE --</option>

							<?php foreach ($listadoPais as $pais): ?>

								<option value="<?php echo $pais->getIdPais(); ?>">
									<?php echo $pais->getDescripcion(); ?>
								</option>

							<?php endforeach ?>
						</select>
					</div>

					<br>
					<div>
						<label for="name1"style="color:black;font-weight: bold;">Provincia</label>
						<select id="select2lista" class="form-control" name="select2lista" required>
							<option value="">-- SELECCIONE --</option>
						</select>
					</div>
					<br>
					<div class="form-group">
						<label for="name1"style="color:black;font-weight: bold;">Localidad</label>
						<select id="select3lista" class="form-control" name="select3lista" required>
							<option value="">-- SELECCIONE --</option>
						</select>

					</div>
					<br>
					<div class="form-group">
						<label for="name1" style="color:black;font-weight: bold;">Barrio</label>
						<select id="select4lista" class="form-control" name="select4lista" required>
							<option value="">-- SELECCIONE --</option>
						</select>
					</div>
					<br>
					<div>
						<input type="text" name="txtCalle" placeholder="Calle" class="col-xs-6">
						<input type="text" name="txtAltura" placeholder="Altura" class="col-xs-6">
					</div>
					<br>
					<div>
						<input type="text" name="txtManzana"  placeholder="Manzana" class="col-xs-6">
						<input type="text" name="txtCasa"  placeholder="Casa" class="col-xs-6">
						<input type="text" name="txtTorre" placeholder="Torre" class="col-xs-6">
						<input type="text" name="txtPiso" placeholder="Piso" class="col-xs-6">
						<input type="text" name="txtObservaciones" placeholder="Observaciones" class="col-xs-6">

					</div>
					<br><br>
				<button type="submit" class="guardar" onclick="validar()";>Guardar</button>
				
				<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>

					<br><br><br>
				<?php

				}?>
				</form>

				<div class="contenedor">

					<table align="center" border="1">
						<h3>Listado de Domicilio</h3>
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
								<th>Acciones</th>
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
										<a href="modificar.php?id_medidor_domicilio=<?php echo $domicilio->getIdMedidorDomicilio(); ?>&id_medidor=<?php echo $domicilio->getIdMedidor(); ?>"><span class="icon icon-pencil"></span></a>
										&nbsp;&nbsp;&nbsp;
							
										<a href="eliminar.php?id_medidor_domicilio=<?php echo $domicilio->getIdMedidorDomicilio(); ?>&id_medidor=<?php echo $domicilio->getIdMedidor(); ?>"><span class="icon icon-bin2"></span></a>
									</td>
								</tr>
							</tbody>

						<?php endforeach ?>

					</table>
				</div>
			</div>

		</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$("#lista1").change(function(){
			$('#select3lista').find('option').remove().end().append('<option value="whatever">-- SELECCIONE --</option>').val('whatever');
			$('#select4lista').find('option').remove().end().append('<option value="whatever">-- SELECCIONE --</option>').val('whatever');

			$.ajax({
			type:"POST",
			url:"datos.php",
			data:"pais=" + $('#lista1').val(),
			success:function(r){
				$('#select2lista').html(r);}

			});
		});

		$("#select2lista").change(function(){
			$('#select4lista').find('option').remove().end().append('<option value="whatever">-- SELECCIONE --</option>').val('whatever');

			$.ajax({
			type:"POST",
			url:"datos2.php",
			data:"provincia=" + $('#select2lista').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
			});
		});

		$("#select3lista").change(function(){
			$.ajax({
			type:"POST",
			url:"datos3.php",
			data:"localidad=" + $('#select3lista').val(),
			success:function(r){
				$('#select4lista').html(r);
			}
			});
		});
	});
</script>


