<?php

require_once "../../class/Periodo.php";

$id_periodo = $_GET['id_periodo'];

$periodo = Periodo::obtenerPorId($id_periodo);

$periodo->eliminar();

header("location: listado.php");

?>