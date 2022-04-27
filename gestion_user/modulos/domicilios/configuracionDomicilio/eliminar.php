<?php

require_once "../../../class/Pais.php";

$idPais = $_GET['id_pais'];

$pais = Pais::obtenerPorId($idPais);
$pais->eliminar();

header("location: listado.php?validacion=eliminado");

?>