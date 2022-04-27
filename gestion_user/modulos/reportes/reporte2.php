<?php

require"conexion.php";
require "plantilla2.php";


$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, 
persona.fecha_nacimiento,cliente.id_cliente FROM cliente
JOIN persona ON persona.id_persona = cliente.id_persona";
$resultado = $mysqli->query($sql);

$pdf = new PDF("P","mm", "letter");
$pdf->AliasNbPages();
$pdf->SetMargins(10,10,10);
$pdf->AddPage();

$pdf->Ln(2);

$pdf->SetFont("Arial", "B", 10);

$pdf->Cell(10, 5, "id", 1, 0, "C");
$pdf->Cell(30, 5, "Nombre", 1, 0, "C");
$pdf->Cell(40, 5, "Apellido", 1, 0, "C");
$pdf->Cell(40, 5, "fecha de nacimiento", 1, 1, "C");

$pdf->SetFont("Arial", "", 9);

while ($fila = $resultado->fetch_assoc()) {
	$pdf->Cell(10, 5, $fila['id_persona'], 1, 0, "C");
	$pdf->Cell(30, 5, $fila['nombre'], 1, 0, "C");
	$pdf->Cell(40, 5, $fila['apellido'], 1, 0, "C");
	$pdf->Cell(40, 5, $fila['fecha_nacimiento'], 1, 1, "C");


}

$pdf->Output();



?>