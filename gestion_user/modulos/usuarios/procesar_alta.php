<?php

require_once "../../class/Usuario.php";

$idPersona = $_POST["txtIdPersona"];
$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$id_perfil = $_POST['cboPerfil'];


$usuario = new Usuario();

$usuario->setIdPersona($idPersona);
$usuario->setUsername($username);
$usuario->setPassword($password);
$usuario->setIdPerfil($id_perfil);


$usuario->guardar();

header("location: usuarios.php?id_persona=" . $idPersona);

?>