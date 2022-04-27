<?php
require_once "../../class/usuario.php";

$idPersona = $_GET['id_persona'];

require_once "../../class/Perfil.php";

$listadoPerfil = Perfil::obtenerTodos();

?>
<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarUsuario.js"></script>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<title></title>
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
	width:85px;
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

			<form method="POST" action="procesar_alta.php">

				<h2 align="center">Registro de usuario</h2>

				<input type="hidden" name="txtIdPersona" value="<?php echo $idPersona?>">

				<label for="Username">Username</label>
				<input type="text" id="txtUsername" name="txtUsername" placeholder="Escribe tu nombre de usuario" >
				<br><br>

				<label for="Password">Password</label>
				<input type="text" id="txtPassword" name="txtPassword" placeholder="Escribe tu contraseña" >
				<br><br>

				
				<label for="perfil">Perfil</label>

				<select name='cboPerfil'>
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoPerfil as $perfil): ?>

						<option value="<?php echo $perfil->getIdPerfil(); ?>">
							<?php echo $perfil->getDescripcion(); ?>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>

				<input type="submit" name="Guardar" onclick="validar();">

			</form>
		</div>
	</div>

</body>
</html>