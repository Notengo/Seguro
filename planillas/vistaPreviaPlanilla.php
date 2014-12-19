<?php
include_once '../login/validar.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if (isset($_POST['generar'])) {
    $idCompania = $_POST['compania'];
    $productor = $_POST['usuario'];
} else {
    $idCompania = $_GET['idCompania'];
}

if ($idCompania != "0" && $productor != "0") {
    $MysqlCompania = $oMysql->getCompaniaActiveRecord();
    $oCompania = new CompaniasValueObject();
    $oCompania = $MysqlCompania->buscarC($idCompania);

    foreach ($oCompania as $aCompania) {
        $nombreC = $aCompania->get_razonsocial();
        $nroPro = $aCompania->get_nroproductor();
    }

    $oMysqlUsuario = $oMysql->getUsuarioActiveRecord();
    $oUsuario = new UsuarioValueObject();
    $oUsuario->set_idUsuario($productor);
    $oUsuario = $oMysqlUsuario->buscar($oUsuario);
    //$usuario = $_POST['usuarioC'];

    foreach ($oUsuario as $aUsuario) {
        $nombreP = $aUsuario->getNombreReal();
        $apellidoP = $aUsuario->get_apellidoReal();
        $idUsu = $aUsuario->get_idUsuario();
    }
    //$nombreP = $_SESSION['nombre'];
    //$apellidoP = $_SESSION['apellido'];
    //$nroProductor=$_POST['nroP'];

    $MysqlPlanilla = $oMysql->getPlanillaActiveRecord();
    $oPlanilla = new PlanillasValueObject();
    $oPlanilla->set_idCompania($idCompania);
    $nro = $MysqlPlanilla->ultimaPlanilla($oPlanilla);
    $nroPlanilla = $nro;
    $fechapago = date('Y-m-d');



    $oMysqlusuarioCompania = $oMysql->getUsuarioCompaniaActiveRecord();
    $oUsuarioCom = new UsuarioCompaniaValueObject();
    $oUsuarioCom->set_idCompania($idCompania);
    $oUsuarioCom->set_idUsuario($productor);
    $oUsuarioCom = $oMysqlusuarioCompania->buscar3($oUsuarioCom);
    if ($oUsuarioCom) {
        foreach ($oUsuarioCom as $aUsuarioCom) {
            $nroProductor = $aUsuarioCom->get_nroProductor();
            $nroProductor = $_POST['productornro'];
        }
    } else {
        $nroProductor = 'No tiene asignado';
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
                    <div class="row">
                        <form action="procesoCierre.php" method="get">
                            <input type="hidden" name="nropla2" value="<?php echo $nroPlanilla; ?>" />
                            <input type="hidden" name="idcompania2" value="<?php echo $idCompania; ?>" />
                            <input type="hidden" name="compania2" value="<?php echo $nombreC; ?>" />
                            <input type="hidden" name="nrop2" value="<?php echo $nroProductor; ?>" /> 
                            <input type="hidden" name="nombrep2" value="<?php echo $nombreP; ?>" /> 
                            <input type="hidden" name="apellidop2" value="<?php echo $apellidoP; ?>" /> 
                            <input type="hidden" name="fecha" value="<?php echo $fechapago; ?>" />
                            <input type="hidden" name="idUsuario" value="<?php echo $idUsu; ?>" />
                            <br>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="label label-primary">N&ordm;Confirmacion</label>
                                    <input class="form-control" type="text" name="nroconfirmacion" />
                                </div>
                                <div class="col-lg-2">
                                    <input type="submit" name="cerrarP" id="cerrarP" class="btn-primary btn form-control" value="Cerrar Planilla" onclick="window.location.href = 'procesoCierre.php'"/>
                                </div>
                            </div>
                        </form>   

                    </div>
                    <br>
                    PRODUCTOR: <?php echo "<strong>" . $nombreP . " " . $apellidoP . "</strong>" ?>
                    <br>
                    N&ordm; DE PRODUCTOR:<?php echo "<strong>" . $nroProductor . "</strong>" ?>
                    <br>
                    N&ordm; DE PLANILLA:<?php echo "<strong>" . $nroPlanilla . "</strong>" ?>
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
                                            . "AND c.planilla = 0";

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
                    <input type="hidden" name="idUsuario" value="<?php echo $idUsu; ?>" />
                    <div class="row">
                        <div class="col-lg-2">
                            <input type="submit" name="vista" id="vista" class="btn-primary btn form-control" value="Visualizar" onclick= />
                        </div>
                        <div class="col-lg-2">
                            <input type="button" name="volver" class="btn btn-large btn-primary form-control" value="Volver" onclick="window.history.back();" />
                        </div>
                    </div>    
                </form>  
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
            <div class="alert alert-warning">  faltan seleccionar datos para generar la planilla!  </div>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <input type="button" name="volver" class="btn-primary btn form-control" value="Volver" onclick="window.history.back();" />
        </div>
    </div>
    <?php
}
?>
<script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
<script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
