<?php

require_once "../../class/EstadoPago.php";

$idEstadoPago = $_GET['id_estado_pago'];

$estadoPago = EstadoPago::obtenerPorId($idEstadoPago);
$estadoPago ->eliminar();

header("location: listado.php");

?>