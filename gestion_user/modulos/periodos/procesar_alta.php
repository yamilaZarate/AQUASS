<?php

require_once "../../class/Periodo.php";

$mes = $_POST['txtMes'];
$anio = $_POST['txtAnio'];

$periodo = new Periodo();

$periodo->setMes($mes);
$periodo->setAnio($anio);


$periodo->guardar();

header("location: listado.php");


?>