<?php

require_once "../../class/EstadoPago.php";

$descripcion = $_POST['txtDescripcion'];

$estadoPago = new EstadoPago();

$estadoPago->setDescripcion($descripcion);

$estadoPago->guardar();

header("location: listado.php");


?>