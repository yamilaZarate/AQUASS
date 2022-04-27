<?php

require_once "../../class/Cliente.php";

$id_cliente = $_POST['txtIdCliente'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
//$fechaNacimiento = $_POST['txtFechaNacimiento'];
$dni = $_POST['txtDni'];
$sexo = $_POST['cboSexo'];


$cliente = Cliente::obtenerPorId($id_cliente);

$cliente->setNombre($nombre);
$cliente->setApellido($apellido);
//$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setDni($dni);
$cliente->actualizar();

header("location: listado.php");


?>