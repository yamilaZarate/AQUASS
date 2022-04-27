<?php

require_once "../../class/Perfil.php";
require_once "../../class/PerfilModulo.php";

$descripcion = $_POST['txtDescripcion'];
$modulo = $_POST['cboModulos'];

$perfil = new Perfil();
$perfil->setDescripcion($descripcion);
$perfil->guardar();



foreach ($modulo as $moduloId){
	$idPerfil= $perfil->getIdPerfil();

	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdModulo($moduloId);
	$perfilModulo->setIdPerfil($idPerfil);

	$perfilModulo->guardar();
}


header("location: listado.php");


?>