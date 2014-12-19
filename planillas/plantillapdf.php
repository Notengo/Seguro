<?php
require_once '../login/validar.php';
require_once '../librerias/fpdf17/fpdf.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$accion=true;

if(isset($_POST['vista']))
{
    $accion=false;
}

if(isset($_POST['vista2']))
{
    $accion=false;
}
$idCompania=$_POST['idcompania'];
$compania=$_POST['compania'];
$nombre=$_POST['nombrep'];
$apellido=$_POST['apellidop'];
$nro=$_POST['nrop'];
$_nroPlanilla=$_POST['nropla'];
if(isset($_POST['confirmacion']))    
{$nroConfirmacion = $_POST['confirmacion'];}
else {$nroConfirmacion = "S/N";}

$oMysqlCuotas= $oMysql->getCuotaActiveRecord();
$oCuota= new CuotasValueObject();

$oMysqlPlanilla= $oMysql->getPlanillaActiveRecord();
$oPlanilla= new PlanillasValueObject();
$_fecha = date('Y-m-d');
$fechapago = $_POST['fecha'];

$oPlanilla->set_idPlanilla($_nroPlanilla);
$oPlanilla->set_fecha($_fecha);
$oPlanilla->set_nroPlanilla($_nroPlanilla);
$oPlanilla->set_idCompania($idCompania);

if($accion==true)
{$oMysqlPlanilla->guardar($oPlanilla);}

$oCuota->set_fechapago($_fecha);
$oCuota = $oMysqlCuotas->buscarPFecha($oCuota);

$cont=0;
foreach ($oCuota as $aCuota)
{  
   $oPlanilla->set_nroPoliza($aCuota->get_nropoliza());
   $oPlanilla->set_nroCuota($aCuota->get_nrocuota());
   if($accion==true){$oMysqlPlanilla->guardarDetalle($oPlanilla);}
  
}



//////////////////////////////////////////////////////////////////
$tabla="";
        $total=0;
        $sql="SELECT p.nropoliza, p.idcompanias, p.cuotas, c.monto, c.fechapago, c.nrocuota, cl.apellido, cl.nombre, c.recibo FROM polizas p "
                                . "INNER JOIN cuotas c ON p.nropoliza = c.nropoliza "
                                . "INNER JOIN clientes cl ON p.idclientes = cl.idclientes "
                                . "WHERE c.fechapago = '$fechapago' AND idcompanias='$idCompania'";
        $resultado = mysql_query($sql) or die(false);
        


///////////////////////////////////////////////////////////////////////////////////
class PDF extends FPDF
{
	function Header()
	{       $fecha=date('d-m-Y');
		$this->SetFont('arial','I', 10);
		$this->Cell(0,5,'fecha',0,0,'R');
                $this->Ln(4);
                $this->Cell(0,5,$fecha,0,0,'R');
		$this->Ln(4);
                $this->SetFont('arial','B', 14);

		global $compania,$nombre,$apellido,$nro,$_nroPlanilla,$cont,$nroConfirmacion;
		$this->SetFont('arial','I',12);
                
		$this->Cell(0,10,'Num. Planilla: '. $_nroPlanilla,0,'L');
		$this->Ln(4);
                $this->Cell(0,10,'Confrimacion: '.$nroConfirmacion,0,'L');
		$this->Ln(4);
                $this->Cell(0,10,'Aseguradora: '.$compania,0,'L');
		$this->Ln(4);
		$this->Cell(0,10,'Productor: '.$nombre.' '.$apellido,0,'L');
		$this->Ln(4);
                $this->Cell(0,10,'Num. Productor: '.$nro,0,'L');
                $this->Ln(4);
		//$this->Line(1,60,209,60);
                $this->Ln(4);
                $this->SetFont('arial','B',10);
	  
	}
	
	function Footer()
	{       
         
	}


}

//$pdf=new FPDF();
//$pdf->AddPage();
//$pdf->Header();

//$pdf->Footer();

$a=new PDF();
$a->AddPage();
$a->Ln(10);
    $a->Cell(200,0,'Lista de Cobro Asegurados',0,0,'C');
    //Cabecera
    $a->SetMargins(0.5,0);
    $a->Ln(4);
    $a->Cell(25,8,'poliza',1,0,'C');
    $a->Cell(90,8,'Socio',1,0,'C');
    $a->Cell(23,8,'Fecha',1,0,'C');
    $a->Cell(20,8,'Importe',1,0,'C');
    $a->Cell(20,8,'Recibo',1,0,'C');
    $a->Cell(13,8,'CU/CL',1,0,'C');
    $a->Cell(18,8,'Recibo',1,0,'C');
    $a->Ln();
if ($resultado) {
    
                while ($fila = mysql_fetch_object($resultado)) {
                $poliza = $fila->nropoliza;
                $monto = $fila->monto;
                $fechapago = $fila->fechapago;
                $nrocuota = $fila->nrocuota;
                $apellido = $fila->apellido;
                $nombre = $fila->nombre;
                $cuotas=$fila->cuotas;
                $recibo=$fila->recibo;
                $total=$total+$monto;
                $datos=array("$poliza","$nombre $apellido","$fechapago","$monto","cupon:0".$nrocuota,"$nrocuota/$cuotas");
                $a->SetFont('Arial','I', 10);
                $a->Cell(25,8,$poliza,0,0,'C');
                $a->Cell(90,8,$nombre.' '.$apellido,0,0,'C');
                $a->Cell(23,8,$fechapago,0,0,'C');
                $a->Cell(20,8,$monto,0,0,'C');
                $a->Cell(20,8,'cupon:0'.$nrocuota,0,0,'C');
                $a->Cell(13,8,$nrocuota.'/'.$cuotas,0,0,'C');
                $a->Cell(18,8,$recibo,0,0,'C');
                $a->Ln();            
            }
                $a->Ln(4);
                $a->Cell(0,10,'-------------------------------------------------------------------------------------------------',0,0,'C');
                $a->Ln(4);
                //$a->Line(0,10 ,10,10);
		$a->SetFont('arial','B',8);
		$a->Cell(0,10,'PESOS: '.$total,0,0,'C');

        } 
//include_once 'listadoPlanilla.php';
//$a->Header();
//$a->Footer();

$a->Output('plantillaPFD.pdf','I');


?>
