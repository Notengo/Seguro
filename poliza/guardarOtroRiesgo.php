<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

extract($_POST, EXTR_OVERWRITE);

mysql_query("BEGIN");
$error = 0;

$oMyOtrosRiesgos = $oMysql->getOtrosRiesgosActiveRecord();
$oOtroRiesgo = new OtrosRiesgosValueObject();
$oOtroRiesgo->set_nombre($nombre);
$oOtroRiesgo->set_descripcion($descripcion);

if (!$oMyOtrosRiesgos->guardar($oOtroRiesgo)) {
    $error = 1;
}

if ($error == 0) {
    mysql_query("COMMIT;");
    ?>
    <div class="col-sm-12 has-success">
        <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="col-sm-12 has-error">
        <input type="text" value="Los Datos No Han Sido Almacenados. Error n° <?php echo $error; ?>" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
}