<?php
include_once '../login/validar.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMyPlanilla = $oMysql->getPlanillaActiveRecord();
$oPlanilla = new PlanillasValueObject();
$oPlanilla->set_idCompania($_POST['compania']);
$oPlanilla->set_nroPlanilla($_POST['planilla']);
//$oPlanilla->set_idPlanilla($oMyPlanilla->ultimaPlanilla($oPlanilla));
$oPlanilla->set_idPlanilla($_POST['planilla']);
$oPlanilla->set_fecha(date('Y-m-d'));
$oPlanilla->set_idUsuario($_SESSION['usuario']);

$oMyPlanilla->guardar($oPlanilla);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Veh&iacute;culos</title>
        <script src="js/ajax-dynamic-list.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script src="js/modal.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form name="vehiculo" class="form-horizontal" action="guardarVehiculo.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <input name="accion" value="Guardar" id="accion" type="hidden"/>
                <div>
                    <legend>N&ordm; Planilla</legend>
                    <div class="row">
                        <div class="has-success">
                            <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
                            <span class="input-icon fui-check-inverted"></span>
                        </div>
                    </div>
                    <br>
                    
                    <div class="col-sm-2">
                        <input type="button" id="volver" value="Volver" class="btn btn-large btn-block btn-primary " onclick="window.location.href = 'index.php'" />
                    </div>
                </div>
            </form>
        </div>
        <?php // include_once '../includes/php/footer.php'; ?>
        <script src="../bootstrap/js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>