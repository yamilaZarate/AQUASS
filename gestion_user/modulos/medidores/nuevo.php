<?php
require_once "../../class/Cliente.php";
require_once "../../class/Medidor.php";
require_once "../../class/Categoria.php";
require_once "../../class/TipoServicio.php";


$servicios = TipoServicio::obtenerTodos();

$listadoCategoria = Categoria::obtenerTodos();
$listadoCliente = Cliente::obtenerTodos();
$numero = Medidor::obtenerNumero();
//highlight_string(var_export($numero));
//exit;
?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarMedidor.js"></script>
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
		width:72px;
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
		/*resize: vertical | horizontal | none | both*/
		resize:none;
		display:block;
	}
	</style>
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

			<form align="center" method="POST" action="procesar_alta.php">
				<h2 align="center">Registro del Medidor</h2>

				<input type="hidden" name="txtNumero" id="txtNumero" value="<?php echo $numero?>">

				<input type="hidden" name="txtEstado" value="<?php echo "1"; ?>">

				<label for="cliente" id="cboCliente">Cliente</label>
				<select name="cboCliente" id="cboCliente" required>
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoCliente as $cliente): ?>

						<option value="<?php echo $cliente->getIdCliente(); ?>">
							<?php echo $cliente->getNombre() ; ?>
							<?php echo $cliente->getApellido() ; ?>
						</option>

					<?php endforeach ?>
				</select>
				<br><br>

				<label for="categoria">Categoria</label>
				<select name="cboCategoria" required="0">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoCategoria as $categoria): ?>

						<option value="<?php echo $categoria->getIdCategoria(); ?>">
							<?php echo $categoria->getDescripcion() ; ?>
						</option>

					<?php endforeach ?>

				</select>


				<br><br>

				<label>Tipo de servicio</label>
				<select name="cboServicios[]" multiple>

					<?php foreach ($servicios as $tipoServicio): ?>
						<option value="<?php echo $tipoServicio->getIdServicio(); ?>">
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