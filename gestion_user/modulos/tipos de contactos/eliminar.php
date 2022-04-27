<?php

require_once "../../class/TipoContacto.php";

$idContacto = $_GET['id_contacto'];

$tipoContacto = TipoContacto::obtenerPorId($idContacto);
$tipoContacto ->eliminar();

header("location: listado.php");

?>