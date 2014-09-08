<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlPoliza = $oMysql->getPolizaActiveRecord();
$oPoliza = new PolizasValueObject();

$oPoliza->set_nropoliza($_POST['nropoliza']);
$oPoliza->set_idcompanias($_POST['idcompanias']);
$oPoliza->set_idclientes($_POST['idclientes']);
$oPoliza->set_patente($_POST['patente']);
$oPoliza->set_idcoberturas($_POST['idcoberturas']);
$oPoliza->set_idotrosriesgos($_POST['idotrosriesgos']);
$oPoliza->set_vigenciadesde($_POST['vigenciadesde']);
$oPoliza->set_vigenciahasta($_POST['vigenciahasta']);
$oPoliza->set_segvencimiento($_POST['segvencimiento']);
$oPoliza->set_premio($_POST['premio']);
$oPoliza->set_prima($_POST['prima']);
$oPoliza->set_cuotas($_POST['cuotas']);
$oPoliza->set_idformaspago($_POST['idformaspago']);
$oPoliza->set_cbu($_POST['cbu']);

$error = 0;

mysql_query("BEGIN;");

if (!$oMysqlPoliza->guardar($oPoliza)) {
    $error = 1;
}
if ($error == 0) {
    mysql_query("COMMIT;");
    ?>
    <div class="form-group has-success">
        <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="form-group has-error">
        <input type="text" value="Los Datos No Han Sido Almacenados. Error n° <?php echo $error; ?>" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
}