<?php

include_once '../login/validar.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if(isset($_POST['generar']))
    {   
    $idCompania = $_POST['compania'];
    }
      else
        {
            $idCompania = $_GET['idCompania'];
        }
        
if ($idCompania != 0) {
    $MysqlCompania = $oMysql->getCompaniaActiveRecord();
    $oCompania = new CompaniasValueObject();
    $oCompania = $MysqlCompania->buscarC($idCompania);

    foreach ($oCompania as $aCompania) {
        $nombreC = $aCompania->get_razonsocial();
        $nroPro = $aCompania->get_nroproductor();
    }

    //$usuario = $_POST['usuarioC'];
    $nombreP = $_SESSION['nombre'];
    $apellidoP = $_SESSION['apellido'];
//$nroProductor=$_POST['nroP'];

    $nroPlanilla = $_GET['nroPlanilla'];
    $fechapago=  date('Y-m-d');
    require_once '../includes/php/header.php';
    ?>
    <html>
        <head>
            <title>Vista Previa Planilla</title>
            <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <legend>Planilla Diaria : <?php echo $nombreC ?></legend>
                    PRODUCTOR: <?php echo "<strong>".$nombreP . " " . $apellidoP."</strong>" ?>
                    <br>
                    DE PRODUCTOR:<?php echo "<strong>".$nroPro."</strong>" ?>
                    <br>
                    DE PLANILLA:<?php echo "<strong>".$nroPlanilla."</strong>" ?>
                    <div>
                        
                        <div class="row"> 
                <div>
                    <table class="table table-hover table-bordered table-condensed table-striped table-responsive">
                        <tr class="success"><th>N&ordm; Poliza</th><th>Monto</th><th>Fecha de Pago</th><th>Cuota N&ordm; / total Cuota</th><th>Apellido</th><th>Nombre</th></tr>
                        <?php
                        $tabla="";
                        $total=0;
                        
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
                                echo $tabla;
                                $tabla="<tr><td>$poliza</td><td>$monto</td><td>$fechapago</td>";
                                $tabla.="<td>$nrocuota/$cuotas</td><td>$apellido</td><td>$nombre</td></tr>";
                                $total=$total+$monto;
                            }
                            
                                $tabla.="<tr><td colspan=6>TOTAL: $total</td></tr>";
                                echo $tabla;
                            } 
                       
                        ?>
                    </table>
                </div>
                
            </div>
                    </div>
                </div>
                <form action="plantillapdf.php" method="post" target="_blank">
                    <input type="hidden" name="nropla" value="<?php echo $nroPlanilla; ?>" />
                    <input type="hidden" name="idcompania" value="<?php echo $idCompania; ?>" />
                    <input type="hidden" name="compania" value="<?php echo $nombreC; ?>" />
                    <input type="hidden" name="nrop" value="<?php echo $nroPro; ?>" /> 
                    <input type="hidden" name="nombrep" value="<?php echo $nombreP; ?>" /> 
                    <input type="hidden" name="apellidop" value="<?php echo $apellidoP; ?>" /> 

                    <div class="row">
                        <div class="col-lg-2">
                            
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" name="vista2" id="vista2" class="btn-primary btn form-control" value="Imprimir" />
                        </div>
                        <div class="col-lg-2">
                            <input type="button" name="volver" class="btn btn-large btn-primary form-control" value="Volver" onclick="window.history.back();" />
                        </div>   
                    </div>
                </form>
                <!--<img src="../images/Eye_scan.jpg" alt="..." class="img-circle" style="width: 200px;">-->
            </div>   
        </body>
    </html>





    <?php
} else {
    ?>
    <head>
        <title>Vista Previa Planilla</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="alert alert-warning">no ha seleccionado una compa&ntilde;ia</div>
            <input type="button" name="volver" class="btn-primary btn" value="Volver" onclick="window.history.back();" />
        </div>
    </div>
    <?php
}
?><script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
