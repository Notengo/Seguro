<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$error = 0;

$oMysqlCompania = $oMysql->getCompaniaActiveRecord();
$oCompania = new CompaniasValueObject();

$oCompania->set_razonsocial($_POST['razonSocial']);
$oCompania->set_nroproductor($_POST['nroproductor']);
$oCompania->set_cuit($_POST['cuit']);
$oCompania->set_direccion($_POST['calle']);
$oCompania->set_numero($_POST['nro']);
$oCompania->set_piso($_POST['piso']);
$oCompania->set_depto($_POST['dpto']);
$oCompania->set_cp($_POST['cp']);
$oCompania->set_telefono($_POST['telefono']);
$oCompania->set_email($_POST['email']);
$oCompania->set_link($_POST['pagina']);

mysql_query("BEGIN;");
if($_POST['accion'] == 'Guardar'){
    if(!$oMysqlCompania->guardar($oCompania)){
        $error = 1;
    }
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