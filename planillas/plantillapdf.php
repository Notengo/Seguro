<?php
require_once '../librerias/fpdf17/fpdf.php';

class PDF extends FPDF
{
	function Header()
	{       $fecha=date('d-m-Y');
		$this->image('logo.png',10,10,25);
		$this->SetFont('arial','B',15);
		$this->Cell(80);
		$this->Cell(30,10,' Seguros Adue ',0,0,'C');
		$this->SetFont('Times','B', 8);
		$this->Cell(0,5,'fecha',0,0,'R');
                $this->Ln(4);
                $this->Cell(0,5,$fecha,0,0,'R');
		$this->Ln(4);
		$this->Cell(0,10,'planilla diaria',0,0,'C');
	
		
		$this->Ln(20);
		
		$this->SetFont('arial','B',10);
		$this->Cell(0,10,'Numero Productor:',0,'L');
		$this->Ln(4);
		$this->Cell(0,10,'Companias:',0,'L');
		$this->Ln(4);
		$this->Cell(0,10,'Planilla N:',0,'L');
		$this->Ln(4);
		$this->Cell(0,10,'usuario:',0,'L');
		$this->Ln(4);
		$this->Line(1,60,209,60);
	   
	  
	  
	}
	
	function Footer()
	{       
                
		$this->SetY(-15);
                $this->Ln(4);
                $this->Line(1,270 , 209, 270);
		$this->SetFont('arial','I',8);
		$this->Cell(0,10,'PESOS',0,0,'C');
	}


}

//$pdf=new FPDF();
//$pdf->AddPage();
//$pdf->Header();

//$pdf->Footer();

$a=new PDF();
$a->AddPage();
$cabecerat=array('certificado','Socio','fecha','importe','recibo','CU/CL');
$a->TablaBasica($cabecerat);
//$a->Header();
//$a->Footer();

$a->Output('plantillaPFD.pdf','I');


?>
