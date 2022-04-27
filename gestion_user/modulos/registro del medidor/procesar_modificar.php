<?php

require_once "../../class/RegistroMedidor.php";

$id_registro_medidor = $_POST["txtIdRegistroMedidor"];
$fecha = $_POST['txtFecha'];
$lecturaActual = $_POST['txtLecturaActual'];
$consumo = $_POST['txtConsumo'];

$registroMedidor = RegistroMedidor::obtenerPorId($id_registro_medidor);

$registroMedidor->setFecha($fecha);
$registroMedidor->setLecturaActual($lecturaActual);
$registroMedidor->setConsumo($consumo);

$registroMedidor->actualizar();

header("location: listado.php");


?>