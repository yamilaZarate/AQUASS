<?php

require_once "../../class/Actividad.php";

$descripcion = $_POST['txtDescripcion'];

$actividad = new Actividad();

$actividad->setDescripcion($descripcion);

$actividad->guardar();

header("location: listado.php");


?>