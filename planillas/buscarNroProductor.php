<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);

$oMysql->conectar();

$oMyUsuComp = $oMysql->getUsuarioCompaniaActiveRecord();

$oUsuC = new UsuarioCompaniaValueObject();

$oUsuC->set_idCompania($_POST['compania']);

$oUsuC->set_idUsuario($_POST['productor']);

$oUsuC = $oMyUsuComp->buscar2($oUsuC);

?>
<select name="productornro" id="productornro" class="form-control">
    <option value="0">Seleccione N&ordm;</option>
    <?php
    foreach ($oUsuC as $aUsuarios) {
        ?>
    <option value="<?php echo $aUsuarios->get_nroProductor(); ?>"><?php echo $aUsuarios->get_nroProductor(); ?></option>
        <?php
    }
    ?>
</select>