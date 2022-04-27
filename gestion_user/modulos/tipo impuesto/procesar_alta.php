<?php

require_once "../../class/TipoImpuesto.php";

$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['txtPorcentaje'];

$tipoImpuesto = new TipoImpuesto();

$tipoImpuesto->setDescripcion($descripcion);
$tipoImpuesto->setPorcentaje($porcentaje);

$tipoImpuesto->guardar();

header("location: listado.php");


?>