<?php

require_once "../../class/EstadoPago.php";

$id_estado_pago = $_POST["txtIdEstadoPago"];

$descripcion = $_POST['txtDescripcion'];

$estadoPago = EstadoPago::obtenerPorId($id_estado_pago);

$estadoPago->setDescripcion($descripcion);

$estadoPago->actualizar();

header("location: listado.php");


?>