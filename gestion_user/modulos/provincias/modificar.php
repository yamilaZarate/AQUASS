<?php

require_once "../../class/Provincia.php";

$id_provincia = $_GET["id_provincia"];

$provincia = Provincia::obtenerPorId($id_provincia);

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

		<input type="hidden" name="txtIdProvincia" value="<?php echo $id_provincia;?>">

		Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $provincia->getDescripcion();?>">
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">
		
	</form>

</body>
</html>