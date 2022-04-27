<?php

require_once "../../class/Factura.php";

$idFactura = $_GET['id_factura'];

$factura = Factura::obtenerPorId($idFactura);
$factura ->eliminar();

header("location: listado.php");

?>