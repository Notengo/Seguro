<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMyFP = $oMysql->getFormasPagoActiveRecord();
$oFP = new FormasPagoValueObject();
$oFP = $oMyFP->buscarTodo();
?>
<select name="formapago" id="formapago" class="form-control" >
    <option value="0">Seleccione</option>
    <?php
    foreach ($oFP as $aFP) {
        ?>
        <option value="<?php echo $aFP->get_idformaspago(); ?>"><?php echo $aFP->get_descripcion(); ?></option>
        <?php
    }
    ?>
</select>