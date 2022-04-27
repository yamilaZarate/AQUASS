<?php

require_once "../../class/Pais.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<br><br>

	<form method="POST" action="procesar_alta.php">

		Descripcion: <input type="text" name="txtDescripcion">
		<br><br>

		<input type="submit" name="Guardar">
		
	</form>

</body>
</html>