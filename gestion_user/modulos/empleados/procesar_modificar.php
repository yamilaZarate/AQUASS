<?php

require_once "../../class/Empleado.php";

$id_empleado = $_POST['txtIdEmpleado'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$dni = $_POST['txtDni'];
$numeroLegajo = $_POST['txtNumeroLegajo'];
$sexo = $_POST['cboSexo'];


$empleado = Empleado::obtenerPorId($id_empleado);

$empleado->setNombre($nombre);
$empleado->setApellido($apellido);
$empleado->setDni($dni);

$empleado->setNumeroLegajo($numeroLegajo);
$empleado->setSexo($sexo);

$empleado->actualizar();

header("location: listado.php");


?>