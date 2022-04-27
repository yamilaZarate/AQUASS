<?php

require_once "../../class/Contacto.php";

$idPersona = $_POST["txtIdPersona"];
$idContacto = $_POST["cboTipoContacto"];
$valor = $_POST["txtValor"];


$contacto = new Contacto();

$contacto->setIdPersona($idPersona);
$contacto->setIdContacto($idContacto);
$contacto->setValor($valor);

$contacto->guardar();


header("location: contactos.php?id_persona=" . $idPersona);




?>