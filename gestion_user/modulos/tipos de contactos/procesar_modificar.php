<?php

require_once "../../class/TipoContacto.php";

$id_contacto = $_POST["txtIdContacto"];
$descripcion = $_POST['txtDescripcion'];


$tipoContacto = TipoContacto::obtenerPorId($id_contacto);

$tipoContacto->setDescripcion($descripcion);

$tipoContacto->actualizar();

header("location: listado.php");


?>