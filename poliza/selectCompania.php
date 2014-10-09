<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlCompania = $oMysql->getCompaniaActiveRecord();
$oCompania = new CompaniasValueObject();
$oCompania = $oMysqlCompania->buscarTodo();
?>
<select name="compania" id="compania" class="form-control" >
    <option value="0">Seleccione</option>
    <?php
    foreach ($oCompania as $aCompania) {
        ?>
    <option value="<?php echo $aCompania->get_idcompanias(); ?>"><?php echo $aCompania->get_razonsocial(); ?></option>
        <?php
    }
    ?>
</select>