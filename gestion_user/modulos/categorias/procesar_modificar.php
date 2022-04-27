<?php

require_once "../../class/Categoria.php";

$id_categoria = $_POST["txtIdCategoria"];
$descripcion = $_POST['txtDescripcion'];

$categoria = Categoria::obtenerPorId($id_categoria);

$categoria->setDescripcion($descripcion);

$categoria->actualizar();

header("location: listado.php");


?>