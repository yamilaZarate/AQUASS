<?php

require_once "../../class/PersonaDomicilio.php";


$idPersona = $_GET["id_persona"];
$idPersonaDomicilio = $_GET["id_persona_domicilio"];


$domicilio = PersonaDomicilio::obtenerPorIdPD($idPersonaDomicilio);
$domicilio->eliminar();


header("location: domicilios.php?id_persona=" . $idPersona . "&modulo=empleados");


?>