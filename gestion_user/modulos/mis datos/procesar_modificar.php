<?php

require_once "../../class/Usuario.php";

$id_usuario = $_POST['txtIdUsuario'];
$id_persona = (10);

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];


$usuario = Usuario::obtenerPorId($id_usuario);

$usuario->setUsername($username);
$usuario->setPassword($password);

$usuario->actualizar();

header("location: usuarios.php?id_persona=" . 10);



?>