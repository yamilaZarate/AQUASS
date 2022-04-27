<?php

require_once "../../class/TipoServicio.php";

$descripcion = $_POST['txtDescripcion'];
$cargoFijo = $_POST['txtCargoFijo'];
$cargoVariable = $_POST['txtCargoVariable'];

$tipoServicio = new TipoServicio();

$tipoServicio->setDescripcion($descripcion);
$tipoServicio->setCargoFijo($cargoFijo);
$tipoServicio->setCargoVariable($cargoVariable);

$tipoServicio->guardar();

header("location: listado.php");


?>