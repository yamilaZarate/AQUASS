<?php

require_once "../../class/Barrio.php";

$idBarrio = $_GET['id_barrio'];

$barrio = Barrio::obtenerPorId($idBarrio);
$barrio ->eliminar();

header("location: listado.php");

?>