<?php
include_once '../login/validar.php';
require_once '../includes/php/header.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$idCompania=$_GET['idcompania2'];
$companian=$_GET['compania2'];
$nombre=$_GET['compania2'];
$apellido=$_GET['apellidop2'];
$nro=$_GET['nrop2'];
$_nroPlanilla=$_GET['nropla2'];


$oMysqlCuotas= $oMysql->getCuotaActiveRecord();
$oCuota= new CuotasValueObject();

$oMysqlPlanilla= $oMysql->getPlanillaActiveRecord();
$oPlanilla= new PlanillasValueObject();
$_fecha =  date('Y-m-d');
$fechapago = date('Y-m-d');

$oPlanilla->set_idPlanilla($_nroPlanilla);
$oPlanilla->set_fecha($_fecha);
$oPlanilla->set_nroPlanilla($_nroPlanilla);
$oPlanilla->set_idCompania($idCompania);

$oMysqlPlanilla->guardar($oPlanilla);// ya me queda guardado el id de la planilla
//$oCuota = $oMysqlCuotas->buscarPFecha($oCuota);                    
    $sql="SELECT p.nropoliza, p.idcompanias, p.cuotas, c.monto, c.fechapago, c.nrocuota, cl.apellido, cl.nombre FROM polizas p "
            . "INNER JOIN cuotas c ON p.nropoliza = c.nropoliza "
            . "INNER JOIN clientes cl ON p.idclientes = cl.idclientes "
            . "WHERE c.fechapago = '$fechapago' AND idcompanias='$idCompania'";


    $resultado = mysql_query($sql) or die(false);
    if ($resultado){
        while ($fila = mysql_fetch_object($resultado)) {
            $poliza = $fila->nropoliza;
            $compania = $fila->idcompanias; 
            $monto = $fila->monto;
            $fechapago = $fila->fechapago;
            $nrocuota = $fila->nrocuota;
            $apellido = $fila->apellido;
            $nombre = $fila->nombre;
            $cuotas=$fila->cuotas;
            
            $oPlanilla->set_nroPoliza($poliza);
            $oPlanilla->set_nroCuota($nrocuota);
            $oMysqlPlanilla->guardarDetalle($oPlanilla);
            
        }

        } 

//var_dump($valores);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Cierre de Planilla</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="alert alert-info">Se ha Cerrado la Planilla N&ordm;: <?php echo $_nroPlanilla;?> de <?php echo $companian;?></div>
            <form action="plantillapdf.php" method="post" target="_blank">
                <input type="hidden" name="nropla" value="<?php echo $_nroPlanilla; ?>" />
                <input type="hidden" name="idcompania" value="<?php echo $idCompania; ?>" />
                <input type="hidden" name="compania" value="<?php echo $companian; ?>" />
                <input type="hidden" name="nrop" value="<?php echo $nro; ?>" /> 
                <input type="hidden" name="nombrep" value="<?php echo $nombre; ?>" /> 
                <input type="hidden" name="apellidop" value="<?php echo $apellido; ?>" />      
            <div class="col-lg-4"></div>
            <div class="col-lg-2">
                <input type="submit" value="Imprimir" name="vista" id="vista" class="btn-primary btn form-control"/>
            </div>
            <div class="col-lg-2">
            <input type="button" value="Volver" name="volver" class="btn-primary btn form-control" onclick="window.location.href='index.php'"/>
            </div>
            </form>
            </div>
        </div>
    </body>
    <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
</html>    