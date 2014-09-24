<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlCobertura = $oMysql->getCoberturasActiveRecord();
$oCobertura = new CoberturasValueObject();
$oCobertura = $oMysqlCobertura->buscarTodo();
?>
<select name="cobertura" id="cobertura" class="form-control" >
    <option value="0">Seleccione</option>
    <?php
    foreach ($oCobertura as $acobertura) {
        ?>
        <option value="<?php echo $acobertura->get_idcoberturas(); ?>"><?php echo $acobertura->get_codigo(); ?></option>
        <?php
    }
    ?>
</select>