<?php

require_once "../../class/Pais.php";

$descripcion = $_POST['txtDescripcion'];

$pais = new Pais();

$pais->setDescripcion($descripcion);

$pais->guardar();

header("location: listado.php");


?>