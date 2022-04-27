<?php

require_once "../../class/Barrio.php";

$id_barrio = $_POST["txtIdBarrio"];
$descripcion = $_POST['txtDescripcion'];

$barrio = Barrio::obtenerPorId($id_barrio);

$barrio->setDescripcion($descripcion);

$barrio->actualizar();

header("location: listado.php");


?>