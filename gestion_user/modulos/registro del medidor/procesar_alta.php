<?php

require_once "../../class/RegistroMedidor.php";

$fecha = $_POST['txtFecha'];
$lecturaActual = $_POST['txtLecturaActual'];
$consumo = $_POST['txtConsumo'];
$medidor = $_POST['cboMedidor'];
$empleado = $_POST['cboEmpleado'];


$registroMedidor = new RegistroMedidor();

$registroMedidor->setFecha($fecha);
$registroMedidor->setLecturaActual($lecturaActual);
$registroMedidor->setConsumo($consumo);
$registroMedidor->setIdMedidor($medidor);
$registroMedidor->setIdEmpleado($empleado);


$registroMedidor->guardar();

header("location: listado.php");


?>