<?php

require_once "configs.php";


$mensaje = "";

if (isset($_GET['error'])) {
	$error = $_GET['error'];

	if ($error == ERROR_LOGIN_CODE) {

		$mensaje = ERROR_LOGIN_MENSAJE;

	} else if ($error == MENSAJE_CODE) {

		$mensaje = MENSAJE_NECESITA_LOGIN;
		
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Autogestion</title>
	<link rel="stylesheet" href="css/login.css">
	

</head>
<body>
	<h3><?php echo $mensaje; ?></h3>

	<br>
	<br>

	<form method="POST" action="modulos/usuarios/procesar_login.php">
		<section class="form-login">
			<center><img src="css/logo2.jpg" style="width:120px; height:120px;"></center>
      		<h5>Login</h5>
      		<input class="controls" type="text" name="txtUsername" value="" placeholder="Usuario">
     		<input class="controls" type="password" name="txtPassword" value="" placeholder="Contraseña">
      		<input class="buttons" type="submit" name="" value="Iniciar sesion">


    </section>
		
	</form>

</body>
</html>