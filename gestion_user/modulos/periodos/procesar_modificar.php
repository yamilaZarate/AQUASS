<?php

require_once "../../class/Periodo.php";

$id_periodo = $_POST["txtIdPeriodo"];
$mes = $_POST["txtMes"];
$anio = $_POST["txtAnio"];


$periodo = Periodo::obtenerPorId($id_periodo);
$periodo->setMes($mes);
$periodo->setAnio($anio);

$periodo->actualizar();

header("location: listado.php");


?>