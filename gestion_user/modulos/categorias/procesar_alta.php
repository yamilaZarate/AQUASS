<?php

require_once "../../class/Categoria.php";

$descripcion = $_POST['txtDescripcion'];

$categoria = new Categoria();

$categoria->setDescripcion($descripcion);

$categoria->guardar();

header("location: listado.php");


?>