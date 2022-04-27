<?php

require_once "../../class/Empleado.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$numeroLegajo = $_POST['txtNumeroLegajo'];
$dni = $_POST['txtDni'];
$estado = $_POST['txtEstado'];
$sexo = $_POST['cboSexo'];


$empleado = new Empleado();

$empleado->setNombre($nombre);
$empleado->setApellido($apellido);
$empleado->setNumeroLegajo($numeroLegajo);
$empleado->setDni($dni);
$empleado->setEstado($estado);
$empleado->setSexo($sexo);

$empleado->guardar();

header("location: listado.php");


?>