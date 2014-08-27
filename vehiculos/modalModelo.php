<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlMarcas = $oMysql->getMarcasActiveRecord();
$oMarcas = new MarcasValueObject();
$oMarcas = $oMysqlMarcas->buscarTodo();
?>
<div class="row">
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
<br>
<div class="row">
    <div class="col-sm-12">
        <label class="label-success label">Modelo</label><br />
        <input class="form-control" data-toggle="tooltip" name="modelo" id="modelo" title="Descripci&oacute;n del modelo" alt="Descripci&oacute;n del modelo" placeholder="Descripci&oacute;n del modelo" type="text"
               onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" /><br/>
        <input type="hidden" id="modelo_hidden" name="modelo_ID" value="" />
    </div>
</div>