<?php

require_once "../../class/TipoVencimiento.php";

$idTipoVencimiento = $_GET['id_tipo_vencimiento'];

$tipoVencimiento = TipoVencimiento::obtenerPorId($idTipoVencimiento);
$tipoVencimiento ->eliminar();

header("location: listado.php");

?>