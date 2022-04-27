<?php

require_once "../../class/Localidad.php";

$descripcion = $_POST['txtDescripcion'];

$localidad = new Localidad();

$localidad->setDescripcion($descripcion);

$localidad->guardar();

header("location: listado.php");


?>