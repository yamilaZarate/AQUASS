<?php

require_once "../../class/Localidad.php";

$idLocalidad = $_GET['id_localidad'];

$localidad = Localidad::obtenerPorId($idLocalidad);

$localidad->eliminar();

header("location: listado.php");

?>