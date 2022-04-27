<?php

require_once "../../class/Pais.php";

$id_pais = $_POST["txtIdPais"];
$descripcion = $_POST['txtDescripcion'];

$pais = Pais::obtenerPorId($id_pais);

$pais->setDescripcion($descripcion);

$pais->actualizar();

header("location: listado.php");


?>