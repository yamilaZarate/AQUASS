<?php

require_once "../../class/Modulo.php";

$id_modulo = $_POST['txtIdModulo'];
$descripcion = $_POST['txtDescripcion'];
$directorio = $_POST['txtDirectorio'];

$modulo = Modulo::obtenerPorId($id_modulo);

$modulo->setDescripcion($descripcion);
$modulo->setDirectorio($directorio);

$modulo->actualizar();

header("location: listado.php");


?>