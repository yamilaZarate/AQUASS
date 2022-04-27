<?php

require_once "../../class/Perfil.php";
require_once "../../class/PerfilModulo.php";

$id_perfil = $_POST["txtIdPerfil"];
$descripcion = $_POST['txtDescripcion'];
$modulos = $_POST['cboModulos'];

$perfil = Perfil::obtenerPorId($id_perfil);

$perfil->setDescripcion($descripcion);

$perfil->actualizar();

$perfilModulo = PerfilModulo::obtenerPorIdPerfil($id_perfil);

$perfilModulo->eliminar($id_perfil);

foreach ($modulos as $moduloId) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdModulo($moduloId);
	$perfilModulo->setIdPerfil($id_perfil);
	$perfilModulo->guardar();
}
// exit;
header("location: listado.php");


?>