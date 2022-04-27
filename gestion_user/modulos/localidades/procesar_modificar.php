<?php

require_once "../../class/Localidad.php";

$id_localidad = $_POST["txtIdLocalidad"];
$descripcion = $_POST['txtDescripcion'];

$localidad = Localidad::obtenerPorId($id_localidad);

$localidad->setDescripcion($descripcion);

$localidad->actualizar();

header("location: listado.php");


?>