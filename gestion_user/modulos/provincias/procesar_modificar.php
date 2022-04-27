<?php

require_once "../../class/Provincia.php";

$id_provincia = $_POST["txtIdProvincia"];
$descripcion = $_POST['txtDescripcion'];

$provincia = Provincia::obtenerPorId($id_provincia);

$provincia->setDescripcion($descripcion);

$provincia->actualizar();

header("location: listado.php");


?>