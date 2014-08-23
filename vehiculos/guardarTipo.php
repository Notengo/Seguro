<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlTipos = $oMysql->getTiposActiveRecord();
$oTipos = new TiposValueObject();

mysql_query("BEGIN;");
$error = 0;
if ($_POST['accion'] == 'Eliminar'){
    $oTipos->set_idtipos($_POST['idtipo']);
    if(!$oMysqlTipos->borrar($oTipos)){
        $error = 3;
    }
} else {
    if($_POST['accion'] == 'Actualizar'){
        $oTipos->set_idtipos($_POST['idtipo']);
    }
    $oTipos->set_descripcion($_POST["tipo"]);

    /* Grabacion de la Tipo. */
    if($_POST['accion'] == 'Guardar') {
        if(!$oMysqlTipos->guardar($oTipos)){
            $error = 1;
        }
    } else {
        if(!$oMysqlTipos->actualizar($oTipos)){
            $error = 2;
        }
    }
}
if($error == 0){
    mysql_query("COMMIT;");
    ?>
    <div class="form-group has-success">
        <div class="col-xs6">
            <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="form-group has-error">
        <div class="col-xs6">
            <input type="text" value="Los Datos No Han Sido Almacenados. Error n° <?php echo $error; ?>" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
}