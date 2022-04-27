<?php

require_once "../../class/TipoVencimiento.php";

$id_tipo_vencimiento = $_GET["id_tipo_vencimiento"];

$tipoVencimiento = TipoVencimiento::obtenerPorId($id_tipo_vencimiento);

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

		<input type="hidden" name="txtIdTipoVencimiento" value="<?php echo $id_tipo_vencimiento; ?>">

		Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $tipoVencimiento->getDescripcion(); ?>"required== $0>
		<br><br>

		Porcentaje: <input type="text" name="txtPorcentaje" value="<?php echo $tipoVencimiento->getPorcentaje(); ?>"required== $0>
		<br><br>



		<input type="submit" name="Guardar" value="Actualizar">
		
	</form>

</body>
</html>