<?php

require_once "../../class/Pais.php";

$id_pais = $_GET["id_pais"];

$pais = Pais::obtenerPorId($id_pais);

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

		<input type="hidden" name="txtIdPais" value="<?php echo $id_pais;?>">

		Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $pais->getDescripcion();?>">
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">
		
	</form>

</body>
</html>