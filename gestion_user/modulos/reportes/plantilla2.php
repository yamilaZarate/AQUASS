<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image("logo.png", 13, 7, 15); 
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Title
    $this->Cell(25);
    $this->Cell(140, 5,"Reporte de Clientes", 0, 0,"C");
    //fecha
    $this->SetFont("Arial", "",10);
    $this->Cell(25, 5,"Fecha: ". date("d/m/Y"), 0, 1,"C");
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

?>