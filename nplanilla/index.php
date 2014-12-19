<?php
include_once '../login/validar.php';
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
require_once '../clases/ValueObject/CompaniasValueObject.php';
require_once '../clases/ActiveRecord/MysqlCompaniasActiveRecord.php';

$oCompania = new MysqlCompaniasActiveRecord();
$valores = new CompaniasValueObject();
$valores = $oCompania->buscarTodo();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Planillas</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php require_once '../includes/php/header.php'; ?>
        <div class="container">
            <legend>N&ordm; Planilla</legend>
            <form action="guardarplanilla.php" method="post">
                <input type="hidden" name="usuarioC" value="<?php echo $_SESSION['usuario']; ?>"/>
                <input type="hidden" name="nroP" value="<?php echo $_SESSION['nroProductor']; ?>"/>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4">
                        <label class="label-success label">Compa&ntilde;ia</label>
                        <?php include_once '../planillas/selectCompania.php'; ?>
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">Planilla</label>
                        <input name="planilla" id="planilla" type="text" class="form-control" />
                    </div>
                </div>
                <br>
                <div class="row">
                    <!--<div class="col-sm-2"></div>-->
                    <div class="col-sm-2">
                        <input type="submit" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" onclick="guardarCliente()">
                    </div>
                </div>
            </form>
            <br>
        </div>
    </body>
    <script src="../bootstrap/js/jquery.min.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
</html>




