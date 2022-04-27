<?php

require_once "../../class/Medidor.php";
require_once "../../class/MedidorTipoServicio.php";


$id_medidor = $_POST["txtIdMedidor"];
$numero = $_POST['txtNumero'];
$id_cliente = $_POST['cboCliente'];
$id_categoria= $_POST['cboCategoria'];
$servicios =$_POST['cboServicio'];

$medidor = Medidor::obtenerPorId($id_medidor);

$medidor->setNumero($numero);
$medidor->setIdCliente($id_cliente);
$medidor->setIdCategoria($id_categoria);

$medidor->actualizar();

$medidorTipoServicio = MedidorTipoServicio::obtenerPoridMedidorB($id_medidor);

$medidorTipoServicio->eliminar($id_medidor);

foreach ($servicios as $servicioId) {
	$medidorTipoServicio->setIdServicio($servicioId);
	$medidorTipoServicio->setIdMedidor($id_medidor);
	$medidorTipoServicio->guardar();
	
}

header("location: listado.php");


?>