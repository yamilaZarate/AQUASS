<?php

require_once "../../class/Cliente.php";

$idCliente = $_GET['id_cliente'];

$cliente = Cliente::obtenerPorId($idCliente);

$cliente->eliminar();

header("location: listado.php");

?>