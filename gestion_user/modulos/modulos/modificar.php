<?php

require_once "../../class/Modulo.php";

$id_modulo = $_GET["id_modulo"];

$Modulo = Modulo::obtenerPorId($id_modulo);

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

		<input type="hidden" name="txtIdModulo" value="<?php echo $id_modulo;?>">

		Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $Modulo->getDescripcion();?>"required== $0>
		<br><br>

		Directorio: <input type="text" name="txtDirectorio" value="<?php echo $Modulo->getDirectorio();?>"required== $0>
		<br><br>

		<input type="submit" name="Guardar" value="Actualizar">
		
	</form>

</body>
</html>