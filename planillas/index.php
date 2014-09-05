<?php

require_once '../librerias/fpdf17/fpdf.php';

$pdf=new FPDF();

$pdf->AddPage();

$pdf->AliasNbPages;
$pdf->SetFont('Arial', 'BI', 14);

$pdf->Cell(0, 0,'Seguros Adue S.A. ||  Parana-Entre Rios');

$pdf->Line(1,22,209,22);

$txt="Aca van los datos de los clientes+pagos";

//$pdf->Image('logo.jpg',170,0,30,20);

$pdf->Ln('7');

$pdf->SetFont('Arial', 'BI', 11);
//$pdf->Cell(0,0,$txt,0,0,'C',1);
$pdf->Cell(180,200,'Linking informatica',0,1,'C');
//$pdf->Cell(2,20,$txt,1,1,'C');

$pdf->Output('planillaSeguro.pdf','I');

//$pdf->Output('primerpdf.pdf','D');
?>
&acute;