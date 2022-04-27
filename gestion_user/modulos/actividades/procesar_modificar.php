<?php

require_once "../../class/Actividad.php";

$id_actividad = $_POST["txtIdActividad"];
$descripcion = $_POST['txtDescripcion'];

$actividad = Actividad::obtenerPorId($id_actividad);

$actividad->setDescripcion($descripcion);

$actividad->actualizar();

header("location: listado.php");


?>