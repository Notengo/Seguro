<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlMarcas = $oMysql->getMarcasActiveRecord();
$oMarcas = new MarcasValueObject();
$oMarcas = $oMysqlMarcas->buscarTodo();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Baucher Seguros - Parametros</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body onload="document.getElementById('razonSocial').focus();">
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Parametros - Modelos</legend>
                <div class="form-group">
                    <div class="col-sm-3">
                        <label class="label-success label">Compa&ntilde;ia</label><br />
                        <select class="form-control" id="marca" name="marca">
                            <?php
                            foreach ($oMarcas as $aMarcas) {
                            ?>
                                <option value="<?php echo $aMarcas->get_idmarcas(); ?>"><?php echo $aMarcas->get_descripcion(); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="label-success label">Modelo</label><br />
                        <input class="form-control" data-toggle="tooltip" name="modelo" id="modelo" title="Descripci&oacute;n del modelo" alt="Descripci&oacute;n del modelo" placeholder="Descripci&oacute;n del modelo" type="text"
                               onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" /><br/>
                        <input type="hidden" id="modelo_hidden" name="modelo_ID" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <input type="button" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" onclick="guardarModelo()" />
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary" onclick="guardarModelo()" />
                    </div>
                    <div class="col-sm-8" id="divResultado"></div>
                </div>
            </form>
            <legend>Listado</legend>
            <div id="listado" class="table-responsive">
                <?php include 'listadoModelos.php'; ?>
            </div>
        </div>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>   
</html>