<?php

require_once "../../class/Cliente.php";
require_once "../../class/Medidor.php";
require_once "../../class/Categoria.php";
require_once "../../class/MedidorTipoServicio.php";
require_once "../../class/TipoServicio.php";

$listadoMedidorTipoServicio = MedidorTipoServicio::obtenerTodos();
$listadoCategoria = Categoria::obtenerTodos();
$listadoCliente = Cliente::obtenerTodos();
$servicio = TipoServicio::obtenerTodos();

$id_medidor = $_GET["id_medidor"];

$medidor = Medidor::obtenerPorId($id_medidor);
$servicios = TipoServicio::obtenerTodos();

$x= $medidor->getServicio();
//highlight_string(var_export($x,true));
//exit;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

	<style>
		*{box-sizing:border-box;}

		form{
			width:400px;
			padding:35px;
			border-radius:25px;
			margin:auto;
			background-color:#dfe9f3;
		}

		form label{
			width:80px;
			font-weight:bold;
			display:inline-block;
		}

		form input[type="text"],
		form input[type="email"]{
			width:200px;
			padding:3px 5px;
			border:1px solid #f6f6f6;
			border-radius:5px;
			background-color:#f6f6f6;
			margin:10px 0;
			display:inline-block;
		}

		form input[type="submit"]{
			width:100%;
			padding:8px 16px;
			margin-top:32px;
			border:1px;
			border-radius:7px;
			display:block;
			color:#fff;
			background-color:#37b839;
		} 

		form input[type="submit"]:hover{
			cursor:pointer;
		}

		textarea{
			width:100%;
			height:100px;
			border:1px solid #BAFAFA;
			border-radius:3px;
			background-color:#BAFAFA;			
			margin:10px 0;
			resize:none;
			display:block;
		}
	</style>
</head>
<body>
	<header>

		<?php require_once "../../menu.php"; ?>

	</header>

	<div id="primerContenedor">
		<div id="contenedorgeneral">
			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>

			<form align="center" method="POST" action="procesar_modificar.php">
				<h3 align="center">Modificar Datos del Medidor</h3>


				<input type="hidden" name="txtIdMedidor" value="<?php echo $id_medidor; ?>">
				<input type="hidden" name="txtNumero" value="<?php echo $medidor->getNumero(); ?>">

				<label>Cliente</label>
				<select name="cboCliente">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoCliente as $cliente): ?>

						<?php

						$selected = "";

						if ($cliente->getIdCliente() == $medidor->getIdCliente()) {
							$selected = "SELECTED";
						}
						?>

						<option <?php echo $selected; ?> value="<?php echo $cliente->getIdCliente(); ?>">
							<?php echo $cliente->getNombre(); ?>
							<?php echo $cliente->getApellido(); ?>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>

				<label>Categoria</label>
				<select name="cboCategoria">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoCategoria as $categoria): ?>

						<?php

						$selected = "";

						if ($categoria->getIdCategoria() == $medidor->getIdCategoria()) {
							$selected = "SELECTED";
						}
						?>

						<option <?php echo $selected; ?> value="<?php echo $categoria->getIdCategoria(); ?>">
							<?php echo $categoria->getDescripcion(); ?>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>

				<label>Servicios</label>
				<select name="cboServicio[]" multiple>

					<?php foreach ($servicios as $tipoServicio): ?>

						<?php

						$selected = '';

						foreach ($medidor->getServicio() as $medidorTipoServicio) {
							if ($tipoServicio->getIdServicio() == $medidorTipoServicio->getIdServicio()) {
								$selected = "SELECTED";
							}
						}

						?>

						<option value="<?php echo $tipoServicio->getIdServicio(); ?>" <?php echo $selected ?>>
							<?php echo $tipoServicio->getDescripcion(); ?>
						</option>
						
					<?php endforeach ?>
					
				</select>
				<br><br>

				<button type="submit" class="guardar" onclick="validar()";>Guardar</button>
				
				<button type="button" class="cancelar" onclick="location.href='listado.php'">Cancelar</button>
			</form>
		</div>
	</div>

</body>
</html>