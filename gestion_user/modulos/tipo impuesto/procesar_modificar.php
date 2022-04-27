<?php

require_once "../../class/TipoImpuesto.php";

$id_impuesto = $_POST["txtIdImpuesto"];
$descripcion = $_POST['txtDescripcion'];
$porcentaje = $_POST['txtPorcentaje'];

$tipoImpuesto = TipoImpuesto::obtenerPorId($id_impuesto);

$tipoImpuesto->setDescripcion($descripcion);
$tipoImpuesto->setPorcentaje($porcentaje);

$tipoImpuesto->actualizar();

header("location: listado.php");


?>