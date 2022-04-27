<?php

require_once "../../class/Provincia.php";

$idProvincia = $_GET['id_provincia'];

$provincia = Provincia::obtenerPorId($idProvincia);

$provincia->eliminar();

header("location: listado.php");

?>