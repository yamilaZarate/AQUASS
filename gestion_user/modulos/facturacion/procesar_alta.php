<?php

require_once "../../class/Factura.php";


$numero = $_POST['txtNumero'];
$fechaEmision = $_POST['txtFechaEmision'];
$id_estado_pago = $_POST['txtEstadoPago'];
$id_periodo = $_POST['cboPeriodo'];
$id_medidor = $_POST['cboMedidor'];
$primer_vencimiento = $_POST['txt1erVencimiento'];
$segundo_vencimiento = $_POST['txt2doVencimiento'];



$factura = new Factura();

$factura->setNumero($numero);
$factura->setFechaEmision($fechaEmision);
$factura->setIdEstadoPago($id_estado_pago);
$factura->setIdPeriodo($id_periodo);
$factura->setIdMedidor($id_medidor);
$factura->setPrimerVencimiento($primer_vencimiento);
$factura->setSegundoVencimiento($segundo_vencimiento);



$factura->guardar();

header("location: listado.php");


?>