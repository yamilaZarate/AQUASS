<?php

require_once "../../class/TipoServicio.php";

$idSevicio = $_GET['id_servicio'];

$tipoServicio = TipoServicio::obtenerPorId($idSevicio);
$tipoServicio ->eliminar();

header("location: listado.php");

?>