<?php

require_once "../../class/Localidad.php";

$id_localidad = $_GET["id_localidad"];

$localidad = Localidad::obtenerPorId($id_localidad);

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

		<input type="hidden" name="txtIdLocalidad" value="<?php echo $id_localidad;?>">

		Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $localidad->getDescripcion();?>">
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">
		
	</form>

</body>
</html>