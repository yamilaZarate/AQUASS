<?php

require_once "../../class/Factura.php";

$numero = $_POST['cboFactura'];
$cliente = $_POST['cboCliente'];
$estadoPago = $_POST['cboEstadoPago'];
$periodo = $_POST['cboPeriodo'];
$medidor = $_POST['cboMedidor'];


$factura = new Factura();

$factura->setNumero($numero);
$factura->setIdCliente($cliente);
$factura->setIdEstadoPago($estadoPago);
$factura->setIdMedidor($medidor);
$factura->setIdPeriodo($periodo);


$factura->guardar();

header("location: listado.php");


?>