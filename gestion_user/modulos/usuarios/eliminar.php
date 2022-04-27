<?php

require_once "../../class/Usuario.php";

$idUsuario = $_GET['id_usuario'];

$usuario = Usuario::obtenerPorId($idUsuario);

$usuario->eliminar();

header("location: listado.php");

?>