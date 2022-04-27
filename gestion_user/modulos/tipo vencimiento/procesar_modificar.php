<?php

require_once "../../class/TipoVencimiento.php";

$idTipoVencimiento = $_POST["txtIdTipoVencimiento"];
$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['txtPorcentaje'];

$tipoVencimiento = TipoVencimiento::obtenerPorId($idTipoVencimiento);

$tipoVencimiento->setDescripcion($descripcion);
$tipoVencimiento->setPorcentaje($porcentaje);

$tipoVencimiento->actualizar();

header("location: listado.php");

?>