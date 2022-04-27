<?php

require_once "../../class/Medidor.php";
require_once "../../class/MedidorTipoServicio.php";

$numero = $_POST['txtNumero'];
$estado = $_POST['txtEstado'];
$idCliente= $_POST['cboCliente'];
$idCategoria= $_POST['cboCategoria'];
$servicios= $_POST['cboServicios'];

$medidor = new Medidor();
$medidor->setNumero($numero);
$medidor->setEstado($estado);
$medidor->setIdCliente($idCliente);
$medidor->setIdCategoria($idCategoria);
$medidor->guardar();


foreach ($servicios as $servicioId) {

	$idMedidor = $medidor->getIdMedidor();
	$medidorTipoServicio = new MedidorTipoServicio();
	$medidorTipoServicio->setIdServicio($servicioId);
	$medidorTipoServicio->setIdMedidor($idMedidor);

	$medidorTipoServicio->guardar();

	# code...
}

header("location: listado.php");


?>