<?php

require_once "../../class/RegistroMedidor.php";

$idRegistroMedidor = $_GET['id_registro_medidor'];
$fecha = $_GET['fecha'];
$lecturaActual = $_GET['lectura_actual'];

$registroMedidor = RegistroMedidor::obtenerPorId($idRegistroMedidor);
$registroMedidor ->eliminar();

header("location: listado.php");

?>