<?php

require_once "../../../class/Pais.php";


$id_pais = $_GET["id_pais"];

$pais = Pais::obtenerPorId($id_pais);


$mensaje = "";

if (isset($_GET["error"])) {
	// code...
	switch ($_GET["error"]) {

	case 'nombrePais':
		$mensaje = "<div class='error'>"."El nombre no debe estar vacio y debe tener minimo 3 caracteres"."</div>";
		break;


	case 'false':
		$mensaje = "<div class='correcto'>"."Datos correctos"."</div>";
		sleep(10);
		break;



}


}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="../../../css/formularios.css">
	<link rel="stylesheet" href="../../../css/main2.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

	<title>AQUAS</title>

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
			resize:none;
			display:block;
		}
		.error{
			background-color: #FF9185;
			font-size: 12px;
			padding: 10px;
		}
		.correcto{
			background-color: #A0DEA7;
			font-size: 12px;
			padding: 10px;
		}
	</style>
	<title>Formulario</title>
</head>
<body>
	<header>
		<nav>
			<?php require_once "../../../menu.php"; ?>
		</nav>
	</header>

	<div id="primerContenedor">
		<div id="contenedorgeneral">
			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>
	

			<form method="POST" action="procesar_modificacionPais.php"  class="form__reg" name="formulario" id="formulario">
						<h3>Modificar datos</h3>


				<input type="hidden" name="txtIdPais" value="<?php echo $id_pais; ?>">

				<?php

				echo $mensaje;

			     ?>

			     <!-- Grupo: Nombre -->
					<div class="formulario__grupo" id="grupo__nombre">
						<label for="nombre" class="formulario__label">Nombre del Pais</label>
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" name="nombre" id="nombre" value="<?php echo $pais->getDescripcion(); ?>" >
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<br>
						<p class="formulario__input-error">El nombre tiene que ser de 4 a 16 caracteres y solo puede contener letras</p>
					</div>

					
					<br>
					<div class="formulario__mensaje" id="formulario__mensaje">
						<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
					</div>

					<div class="formulario__grupo formulario__grupo-btn-enviar">
						<br>
						<button type="submit" class="formulario__btn" >Enviar</button>
						<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
						<br>
					</div>
				</form>
				
			</form>
		</div>
	</div>
</div>
</main>
		<script src="../../../js/formularioCategorias.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>