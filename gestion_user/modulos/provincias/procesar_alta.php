<?php

require_once "../../class/Provincia.php";

$descripcion = $_POST['txtDescripcion'];

$provincia = new Provincia();

$provincia->setDescripcion($descripcion);

$provincia->guardar();

header("location: listado.php");


?>