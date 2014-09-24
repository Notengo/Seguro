<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlCobertura = $oMysql->getCoberturasActiveRecord();
$oCobertura = new CoberturasValueObject();
$oCobertura->set_descripcion($_POST['descripcion']);
$oCobertura->set_codigo($_POST['codigo']);
$oCobertura->set_nombre($_POST['nombre']);

mysql_query("BEGIN");
$error = 0;

if (!$oMysqlCobertura->guardar($oCobertura)) {
    $error = 1;
}

if ($error == 0) {
    mysql_query("COMMIT;");
    ?>
    <div class="row has-success">
        <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="row has-error">
        <input type="text" value="Los Datos No Han Sido Almacenados. Error n° <?php echo $error; ?>" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
}