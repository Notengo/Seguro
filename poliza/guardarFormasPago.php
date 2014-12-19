<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMyFP = $oMysql->getFormasPagoActiveRecord();
$oFP = new FormasPagoValueObject();

mysql_query("BEGIN;");
$error = 0;
if ($_POST['accion'] == 'Eliminar') {
    $oFP->set_idformaspago($_POST['idFp']);
    if (!$oMyFP->borrar($oFP)) {
        $error = 3;
    }
} else {
    if ($_POST['accion'] == 'Actualizar') {
        $oFP->set_idformaspago($_POST['idFp']);
    }
    $oFP->set_descripcion($_POST["descripcion"]);

    /* Grabacion de la Marca. */
    if ($_POST['accion'] == 'Guardar') {
        if (!$oMyFP->guardar($oFP)) {
            $error = 1;
        }
    } else {
        if (!$oMyFP->actualizar($oFP)) {
            $error = 2;
        }
    }
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