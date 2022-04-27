<?php

require_once "../../class/Barrio.php";

$descripcion = $_POST['txtDescripcion'];

$barrio = new Barrio();

$barrio->setDescripcion($descripcion);

$barrio->guardar();

header("location: listado.php");


?>