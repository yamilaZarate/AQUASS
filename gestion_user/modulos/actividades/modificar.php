<?php

require_once "../../class/Actividad.php";

$id_actividad = $_GET["id_actividad"];

$actividad = Actividad::obtenerPorId($id_actividad);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>AQUAS</title>
		<meta name = "author" content="Zarate Yamila">
		<meta name= "" content = "Autogestion">
		<link rel="stylesheet" type="text/css" href="#">
		<style></style> 
	</head>
		<body>

			<?php require_once "../../menu.php"; ?>

			<br><br>
			<div>

				<form method="POST" action="procesar_modificar.php">
					<fieldset>
						<legend>Modificar Actividad</legend>

						<input type="hidden" name="txtIdActividad" value="<?php echo $id_actividad;?>">

						Descripcion: <input type="text" name="txtDescripcion" value="<?php echo $actividad->getDescripcion();?>"required== $0>
						<br><br>

						<input type="submit" name="Guardar" value="Actualizar">
					</fieldset>
					
				</form>
			</div>

		</body>
</html>