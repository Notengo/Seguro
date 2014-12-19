<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlMarca = $oMysql->getMarcasActiveRecord();
$oMarca = new MarcasValueObject();

mysql_query("BEGIN;");
$error = 0;
if ($_POST['accion'] == 'Eliminar') {
    $oMarca->set_idmarcas($_POST['idmarca']);
    if (!$oMysqlMarca->borrar($oMarca)) {
        $error = 3;
    }
} else {
    if ($_POST['accion'] == 'Actualizar') {
        $oMarca->set_idmarcas($_POST['idmarca']);
    }
    $oMarca->set_descripcion($_POST["marca"]);

    /* Grabacion de la Marca. */
    if ($_POST['accion'] == 'Guardar') {
        if (!$oMysqlMarca->guardar($oMarca)) {
            $error = 1;
        }
    } else {
        if (!$oMysqlMarca->actualizar($oMarca)) {
            $error = 2;
        }
    }
}

//$error = 1;

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