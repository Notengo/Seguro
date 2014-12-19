<?php
include_once '../login/validar.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if (isset($_POST['generar'])) {
    $idCompania = $_POST['compania'];
} else {
    $idCompania = $_GET['idCompania'];
    $_idUsuario = $_GET['idUsu'];
}

if ($idCompania != 0) {
    $MysqlCompania = $oMysql->getCompaniaActiveRecord();
    $oCompania = new CompaniasValueObject();
    $oCompania = $MysqlCompania->buscarC($idCompania);

    foreach ($oCompania as $aCompania) {
        $nombreC = $aCompania->get_razonsocial();
        $nroPro = $aCompania->get_nroproductor();
    }

    $MysqlUsuario = $oMysql->getUsuarioActiveRecord();
    $oUsuario = new UsuarioValueObject();
    $oUsuario->set_idUsuario($_idUsuario);
    $oUsuario = $MysqlUsuario->buscarId($oUsuario);

    foreach ($oUsuario as $aUsuario) {
        $nombreP = $aUsuario->getNombreReal();
        $apellidoP = $aUsuario->get_apellidoReal();
    }


    $oMysqlusuarioCompania = $oMysql->getUsuarioCompaniaActiveRecord();
    $oUsuarioCom = new UsuarioCompaniaValueObject();
    $oUsuarioCom->set_idCompania($idCompania);
    $oUsuarioCom->set_idUsuario($_idUsuario);
    $oUsuarioCom = $oMysqlusuarioCompania->buscar3($oUsuarioCom);
    if ($oUsuarioCom) {
        foreach ($oUsuarioCom as $aUsuarioCom) {
            $nroProductor = $aUsuarioCom->get_nroProductor();
        }
    } else {
        $nroProductor = 'No tiene asignado';
    }

    $nroPlanilla = $_GET['nroPlanilla'];
    $fechapago = $_GET['fecha'];
    $sql2 = "SELECT nroConfirmacion FROM planilla WHERE idPlanilla=" . $nroPlanilla . "";
    $resultado2 = mysql_query($sql2) or die(false);
    if ($resultado2) {
        while ($fila = mysql_fetch_object($resultado2)) {
            $confirmacion = $fila->nroConfirmacion;
        }
    }
    ?>
    <html>
        <head>
            <title>Vista Previa Planilla</title>
            <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        </head>
        <body>
            <?php require_once '../includes/php/header.php'; ?>
            <div class="container">
                <div class="row">
                    <legend>Planilla Diaria : <?php echo $nombreC ?></legend>
                    NUM. CONFIRMACION: <?php echo "<strong>" . $confirmacion . "</strong>" ?>
                    <br>
                    PRODUCTOR: <?php echo "<strong>" . $nombreP . " " . $apellidoP . "</strong>" ?>
                    <br>
                    NUM. DE PRODUCTOR:<?php echo "<strong>" . $nroProductor . "</strong>" ?>
                    <br>
                    NUM. DE PLANILLA:<?php echo "<strong>" . $nroPlanilla . "</strong>" ?>
                    <div>

                        <div class="row"> 
                            <div>
                                <table class="table table-hover table-bordered table-condensed table-striped table-responsive">
                                    <tr class="success"><th>N&ordm; Poliza</th><th>Socio</th><th>Fecha de Pago</th><th>Importe</th><th>Recibo</th><th>CU/CL</th></tr>
                                    <?php
                                    $tabla = "";
                                    $total = 0;

                                    $sql = "SELECT p.nropoliza, p.idcompanias, p.cuotas, c.monto, c.fechapago, c.nrocuota, cl.apellido, cl.nombre FROM polizas p "
                                            . "INNER JOIN cuotas c ON p.nropoliza = c.nropoliza "
                                            . "INNER JOIN clientes cl ON p.idclientes = cl.idclientes "
                                            . "WHERE c.fechapago = '$fechapago' AND idcompanias='$idCompania' "
                                            . "AND c.planilla = " . $nroPlanilla;


                                    $resultado = mysql_query($sql) or die(false);
                                    if ($resultado) {
                                        while ($fila = mysql_fetch_object($resultado)) {
                                            $poliza = $fila->nropoliza;
                                            $compania = $fila->idcompanias;
                                            $monto = $fila->monto;
                                            $fechapago = $fila->fechapago;
                                            $nrocuota = $fila->nrocuota;
                                            $apellido = $fila->apellido;
                                            $nombre = $fila->nombre;
                                            $cuotas = $fila->cuotas;

                                            echo $tabla;
                                            $tabla = "<tr><td>$poliza</td><td>$nombre $apellido</td><td>$fechapago</td>";
                                            $tabla.="<td>$monto</td><td>cupon:$nrocuota</td><td>$nrocuota/$cuotas</td></tr>";
                                            ;
                                            $total = $total + $monto;
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
                    <input type="hidden" name="nrop" value="<?php echo $nroProductor; ?>" /> 
                    <input type="hidden" name="nombrep" value="<?php echo $nombreP; ?>" /> 
                    <input type="hidden" name="apellidop" value="<?php echo $apellidoP; ?>" /> 
                    <input type="hidden" name="fecha" value="<?php echo $fechapago; ?>" />
                    <input type="hidden" name="confirmacion" value="<?php echo $confirmacion; ?>" />
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
