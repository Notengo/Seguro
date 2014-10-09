<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMyOtrosRiesgos = $oMysql->getOtrosRiesgosActiveRecord();
$oORiesgo = new OtrosRiesgosValueObject();
$oORiesgo = $oMyOtrosRiesgos->buscarTodo();
?>
<select name="otroRiesgo" id="otroRiesgo" class="form-control" >
    <option value="0">Seleccione</option>
    <?php
    foreach ($oORiesgo as $aORiesgo) {
        ?>
        <option value="<?php echo $aORiesgo->get_idotrosriesgos(); ?>"><?php echo $aORiesgo->get_nombre(); ?></option>
        <?php
    }
    ?>
</select>