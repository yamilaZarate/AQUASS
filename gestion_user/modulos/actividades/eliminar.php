<?php

require_once "../../class/Actividad.php";

$idActividad = $_GET['id_actividad'];

$actividad = Actividad::obtenerPorId($idActividad);
$actividad ->eliminar();

header("location: listado.php?validacion=eliminado");

?>