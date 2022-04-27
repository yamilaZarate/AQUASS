<?php

require_once "../../class/Medidor.php";

$idMedidor = $_GET['id_medidor'];

$medidor = Medidor::obtenerPorId($idMedidor);
$medidor ->eliminar();

header("location: listado.php");

?>