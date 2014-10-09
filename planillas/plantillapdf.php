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

$oMysqlCuotas= $oMysql->getCuotaActiveRecord();
$oCuota= new CuotasValueObject();

$oMysqlPlanilla= $oMysql->getPlanillaActiveRecord();
$oPlanilla= new PlanillasValueObject();
$_fecha = date('Y-m-d');
$fechapago = date('Y-m-d');

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
        $sql="SELECT p.nropoliza, p.idcompanias, p.cuotas, c.monto, c.fechapago, c.nrocuota, cl.apellido, cl.nombre FROM polizas p "
                                . "INNER JOIN cuotas c ON p.nropoliza = c.nropoliza "
                                . "INNER JOIN clientes cl ON p.idclientes = cl.idclientes "
                                . "WHERE c.fechapago = '$fechapago' AND idcompanias='$idCompania'";
        $resultado = mysql_query($sql) or die(false);
        


///////////////////////////////////////////////////////////////////////////////////
class PDF extends FPDF
{
	function Header()
	{       $fecha=date('d-m-Y');
		$this->image('logo.png',10,10,25);
		$this->SetFont('arial','B',25);
		$this->Cell(80);
		$this->Cell(30,10,' Seguros Adue ',0,0,'C');
		$this->SetFont('arial','I', 10);
		$this->Cell(0,5,'fecha',0,0,'R');
                $this->Ln(4);
                $this->Cell(0,5,$fecha,0,0,'R');
		$this->Ln(4);
                $this->SetFont('arial','B', 14);
		$this->Cell(0,10,'planilla diaria',0,0,'C');
	
		
		$this->Ln(20);
		global $compania,$nombre,$apellido,$nro,$_nroPlanilla,$cont;
		$this->SetFont('arial','I',12);
		
                $this->Cell(0,10,'Aseguradora:'.$compania,0,'L');
		$this->Ln(4);
		$this->Cell(0,10,'Planilla:'. $_nroPlanilla,0,'L');
		$this->Ln(4);
		$this->Cell(0,10,'Productor:'.$nombre.' '.$apellido,0,'L');
		$this->Ln(4);
                $this->Cell(0,10,'Nº Productor:'.$nro,0,'L');
                $this->Ln(4);
		$this->Line(1,60,209,60);
                $this->Ln(4);
                $this->SetFont('arial','B',10);
	  
	}
	
	function Footer()
	{       
            global $total;
            $this->SetY(-15);
                $this->Ln(4);
                $this->Line(1,270 , 209, 270);
		$this->SetFont('arial','B',8);
		$this->Cell(0,10,'PESOS: '.$total,0,0,'C');
	}


}

//$pdf=new FPDF();
//$pdf->AddPage();
//$pdf->Header();

//$pdf->Footer();

$a=new PDF();
$a->AddPage();
$cabecerat=array('poliza','Socio','fecha pago','importe','recibo','CU/CL');
$a->TablaBasica($cabecerat);


if ($resultado) {
    
                while ($fila = mysql_fetch_object($resultado)) {
                $poliza = $fila->nropoliza;
                $monto = $fila->monto;
                $fechapago = $fila->fechapago;
                $nrocuota = $fila->nrocuota;
                $apellido = $fila->apellido;
                $nombre = $fila->nombre;
                $cuotas=$fila->cuotas;
                $total=$total+$monto;
                $datos=array("$poliza","$nombre $apellido","$fechapago","$monto","cupon:0".$nrocuota,"$nrocuota/$cuotas");
                
                $a->TablaDatos($datos);            
            }

        } 
//include_once 'listadoPlanilla.php';
//$a->Header();
//$a->Footer();

$a->Output('plantillaPFD.pdf','I');


?>
