
<?php

require_once "../../class/PersonaDomicilio.php";

$idPersona = $_POST["txtId"];
$idPersonaDomicilio = $_POST["txtIdPersona"];
$pais = $_POST["lista1"];
$provincia = $_POST["select2lista"];
$localidad = $_POST["select3lista"];
$barrio = $_POST["select4lista"];
$calle = $_POST["txtCalle"];
$altura = $_POST["txtAltura"];
$manzana = $_POST["txtManzana"];
$casa = $_POST["txtCasa"];
$torre = $_POST["txtTorre"];
$piso = $_POST["txtPiso"];
$observaciones = $_POST["txtObservaciones"];

$domicilio = PersonaDomicilio::obtenerPorIdPD($idPersonaDomicilio);

$domicilio->setIdPersona($idPersona);
//$domicilio->setIdDomicilio($idDomicilio);
//$domicilio->barrio->localidad->provincia->pais->setDescripcion($pais);
//$domicilio->barrio->localidad->provincia->setDescripcion($provincia);
//$domicilio->barrio->localidad->setDescripcion($localidad);
$domicilio->setIdBarrio($barrio);
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setManzana($manzana);
$domicilio->setNumeroCasa($casa);
$domicilio->setTorre($torre);
$domicilio->setPiso($piso);
$domicilio->setObservaciones($piso);



$domicilio->actualizar();



header("location: domicilios.php?id_persona=" . $idPersona . "&modulo=empleados");




?>