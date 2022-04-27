<?php

require_once "../../class/TipoImpuesto.php";

$idImpuesto = $_GET['id_impuesto'];

$tipoImpuesto = TipoImpuesto::obtenerPorId($idImpuesto);
$tipoImpuesto ->eliminar();

header("location: listado.php");

?>