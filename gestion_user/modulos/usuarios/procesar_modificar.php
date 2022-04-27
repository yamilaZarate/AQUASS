<?php

require_once "../../class/Usuario.php";

$id_usuario = $_POST['txtIdUsuario'];
$id_persona = $_POST['txtIdPersona'];

$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$id_perfil = $_POST['cboPerfil'];


$usuario = Usuario::obtenerPorId($id_usuario);

$usuario->setUsername($username);
$usuario->setPassword($password);
$usuario->setIdPerfil($id_perfil);

$usuario->actualizar();

header("location: usuarios.php?id_persona=" . $id_persona);



?>