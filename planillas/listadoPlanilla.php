<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlPlanilla= $oMysql->getPlanillaActiveRecord();
$oPlanilla= new PlanillasValueObject();
$fechapago = date('Y-m-d');


//require_once '../includes/php/header.php';
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
                <div>
                    <table class="table table-hover table-bordered table-condensed table-striped table-responsive">
                        <tr class="success"><th>N&ordm; Poliza</th><th>Monto</th><th>Fecha de Pago</th><th>Cuota N&ordm; / total Cuota</th><th>Apellido</th><th>Nombre</th></tr>
                        <?php
                        $tabla="";
                        $total=0;
//                        $sql2="SELECT p.nropoliza, p.idcompanias, p.cuotas, c.monto, c.fechapago, c.nrocuota, cl.apellido, cl.nombre"
//                                . "FROM polizas p INNER JOIN cuotas c ON p.nropoliza = c.nropoliza"
//                                . "INNER JOIN clientes cl ON p.idclientes = cl.idclientes"
//                                . "WHERE c.fechapago = '$fechapago' AND idcompanias='".$idCompania."'";
                        
                        $sql = "SELECT p.nropoliza, p.cuotas, c.monto, c.fechapago, c.nrocuota, cl.apellido, cl.nombre FROM polizas p "
                                . "INNER JOIN cuotas c ON p.nropoliza = c.nropoliza "
                                . "INNER JOIN clientes cl ON p.idclientes = cl.idclientes "
                                . "WHERE c.fechapago = '" . $fechapago . "';";
                        $resultado = mysql_query($sql) or die(false);
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
                                $tabla="<tr><td>$poliza</td><td>$monto</td><td>$fechapago</td>";
                                $tabla.="<td>$nrocuota/$cuotas</td><td>$apellido</td><td>$nombre</td></tr>";
                                echo $tabla;
                            }
                            
                            $tabla.="<tr><td colspan=6>TOTAL: $total</td></tr>";
                            echo $tabla;
                        } 
                       
                        ?>
                    </table>
                </div>
                
            </div>
        </div> 
    </body>
</html>





<?php

?>
<script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>