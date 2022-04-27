<?php

require_once "../../class/Usuario.php";
require_once "../../class/Perfil.php";

$idPersona = $_GET['id_persona'];

$listadoPerfil = Perfil::obtenerTodos();

$id_usuario = $_GET["id_usuario"];

$usuario2 = Usuario::obtenerPorId($id_usuario);

//highlight_string(var_export($usuario));
//exit;
?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

	<script>
  	function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  	}
	</script>

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

			<form method="POST" action="procesar_modificar.php">
				<h3 align="center">Modificar datos del usuario</h3>

				<input type="hidden" name="txtIdUsuario" value="<?php echo $id_usuario?>">


				<input type="hidden" name="txtIdPersona" value="<?php echo $idPersona?>">

				
				username: <input type="text" name="txtUsername" value="<?php echo $usuario2->getUsername(); ?>">
				<br><br>

				Password:<input type="Password" id="password" name="txtPassword" value="<?php echo $usuario2->getPassword(); ?>">
				<br><br>
				<button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>


				<br><br>
				Perfil:
				<select name="cboPerfil">
					<option value="NULL">---Seleccionar---</option>

					<?php foreach ($listadoPerfil as $perfil): ?>

						<?php

						$selected = "";

						if ($perfil->getIdPerfil() == $usuario2->getIdPerfil()) {
							$selected = "SELECTED";
						}

						?>

						<option <?php echo $selected; ?> value="<?php echo $perfil->getIdPerfil(); ?>">
							<?php echo $perfil->getDescripcion(); ?>
						</option>

					<?php endforeach ?>

				</select>
				<br><br>


				<input type="submit" name="Guardar" value="Actualizar">
				
			</form>
		</div>
	</div>

</body>
</html>