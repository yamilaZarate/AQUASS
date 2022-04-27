<?php

require_once "../../class/TipoVencimiento.php";

$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['txtPorcentaje'];

$tipoVencimiento = new TipoVencimiento();

$tipoVencimiento->setDescripcion($descripcion);
$tipoVencimiento->setPorcentaje($porcentaje);

$tipoVencimiento->guardar();

header("location: listado.php");

 
?>