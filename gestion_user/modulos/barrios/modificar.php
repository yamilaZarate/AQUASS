<?php

require_once "../../class/Barrio.php";

$id_barrio = $_GET["id_barrio"];

$barrio = Barrio::obtenerPorId($id_barrio);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>

	<br><br>

	<form method="POST" action="procesar_modificar.php">

		<input type="hidden" name="txtIdBarrio" value="<?php echo $id_barrio;?>">

		Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $barrio->getDescripcion();?>">
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">
		
	</form>

</body>
</html>