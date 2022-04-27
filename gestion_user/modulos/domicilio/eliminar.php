<?php

require_once "../../class/MedidorDomicilio.php";


$idMedidor = $_GET["id_medidor"];
$idMedidorDomicilio = $_GET["id_medidor_domicilio"];


$domicilio = MedidorDomicilio::obtenerPorIdMD($idMedidorDomicilio);
$domicilio->eliminar();


header("location: domicilio.php?id_medidor=" . $idMedidor);


?>