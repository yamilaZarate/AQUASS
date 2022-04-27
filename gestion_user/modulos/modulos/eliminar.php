<?php

require_once "../../class/Modulo.php";

$id_modulo = $_GET['id_modulo'];

$modulo = Modulo::obtenerPorId($id_modulo);
$modulo->eliminar();

header("location: listado.php");

?>