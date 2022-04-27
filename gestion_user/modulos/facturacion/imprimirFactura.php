<?php

require"conexion.php";
require "plantilla.php";


$sql = "SELECT * FROM factura WHERE id_factura={$idFactura}";
$resultado = $mysqli->query($sql);

$pdf = new PDF("P","mm", "letter");
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();

$pdf->Ln(2);

$pdf->SetFont("Arial", "B", 10);

$pdf->Cell(10, 5, "id", 1, 0, "C");
$pdf->Cell(20, 5, "Numero", 1, 0, "C");
$pdf->Cell(40, 5, "Fecha emision", 1, 0, "C");
$pdf->Cell(40, 5, "Estado de Pago", 1, 0, "C");
$pdf->Cell(30, 5, "Periodo", 1,0, "C");
$pdf->Cell(40, 5, "Medidor", 1,1, "C");


$pdf->SetFont("Arial", "", 9);

while ($fila = $resultado->fetch_assoc()) {
	$pdf->Cell(10, 5, $fila['id_factura'], 1, 0, "C");
	$pdf->Cell(20, 5, $fila['numero'], 1, 0, "C");
	$pdf->Cell(40, 5, $fila['fecha_emision'], 1, 0, "C");
	$pdf->Cell(40, 5, $fila['id_estado_pago'], 1, 0, "C");
	$pdf->Cell(30, 5, $fila['id_periodo'], 1,0 , "C");
	$pdf->Cell(40, 5, $fila['id_medidor'], 1,1 , "C");


}

$pdf->Output();



?>