<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

extract($_GET, EXTR_OVERWRITE);

$oMyCuotas = $oMysql->getCuotaActiveRecord();
$oCuota = new CuotasValueObject();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Poliza - Cuotas</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="../includes/js/funciones.js"></script>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <legend>Cuotas de Poliza</legend>
            <table class="table table-striped table-bordered table-hover tab-pane table-condensed">
                <tr>
                    <th>N&ordm; de Poliza</th>
                    <th>1&ordf; vencimiento</th>
                    <th>pagado</th>
                    <th>Monto</th>
                    <th>N&ordm; Cuota</th>
                    <th>Acciones</th>
                </tr>
                <tr>

                </tr>
            </table>
            <div class="row">
                <div class="col-sm-2">
                    <input type="button" id="volver" value="Volver" class="btn btn-large btn-block btn-primary " onclick="window.history.back();" />
                </div>
                <div class="col-sm-8" id="divResultado"></div>
            </div> 
        </div>
        <?php include_once '../includes/php/footer.php'; ?>
    </body>
</html>