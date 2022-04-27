<?php

require_once "../../class/Cliente.php";

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
//$fechaNacimiento = $_POST['txtFechaNacimiento'];
$dni = $_POST['txtDni'];
$estado = $_POST['txtEstado'];
$sexo = $_POST['cboSexo'];


$cliente = new Cliente();

$cliente->setNombre($nombre);
$cliente->setApellido($apellido);
$cliente->setEstado($estado);
//$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setDni($dni);
$cliente->setSexo($sexo);

$cliente->guardar();

header("location: listado.php");


?>