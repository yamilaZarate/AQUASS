<?php

require_once "../../class/Actividad.php";
?>

<!DOCTYPE html>
<html>
<head>
	<script src="../../js/validaciones/validarActividad.js"></script>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<br><br>

	<form method="POST" action="procesar_alta.php">

		Descripcion: <input type="text" id="txtDescripcion" name="txtDescripcion" required== $0>
		<br><br>

		<input type="submit" name="Guardar" onclick="validar();">
		
	</form>

</body>
</html>