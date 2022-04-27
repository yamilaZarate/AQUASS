<?php

require_once "../../class/TipoServicio.php";

$id_servicio = $_POST["txtIdServicio"];
$descripcion = $_POST['txtDescripcion'];
$cargo_fijo = $_POST['txtCargoFijo'];
$cargo_variable = $_POST['txtCargoVariable'];


$tipoServicio = TipoServicio::obtenerPorId($id_servicio);

$tipoServicio->setDescripcion($descripcion);
$tipoServicio->setCargoFijo($cargo_fijo);
$tipoServicio->setCargoVariable($cargo_variable);

$tipoServicio->actualizar();

header("location: listado.php");


?>