<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
    <meta name="author" content="Yamila Zarate">
    <link rel="stylesheet" href="index.html">
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
</head>
<body>
	<header>
		<nav>
			<?php require_once "menuCliente.php"; ?>
		</nav>
	</header>

	<div id="primerContenedor">
		<div align="center" id="bienvenido">
			Bienvenido al Inicio <?php echo $usuario;?>

		</div>
	</div>

	<div class="slider">
		<ul align="center">
			<li><img src="cuidemos.png" alt=""></li>
			<li><img src="consejos.png" alt=""></li>
			<li><img src="cuidemos.png" alt=""></li>
			<li><img src="consejos.png" alt=""></li>


		</ul>

</body>
</html>