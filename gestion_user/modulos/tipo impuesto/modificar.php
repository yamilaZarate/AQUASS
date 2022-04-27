<?php

require_once "../../class/TipoImpuesto.php";

$id_impuesto = $_GET["id_impuesto"];

$tipoImpuesto = TipoImpuesto::obtenerPorId($id_impuesto);

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

		<input type="hidden" name="txtIdImpuesto" value="<?php echo $id_impuesto; ?>">

		Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $tipoImpuesto->getDescripcion(); ?>"required== $0>
		<br><br>

		Porcentaje: <input type="text" name="txtPorcentaje" value="<?php echo $tipoImpuesto->getPorcentaje(); ?>"required== $0>
		<br><br>



		<input type="submit" name="Guardar" value="Actualizar">
		
	</form>

</body>
</html>