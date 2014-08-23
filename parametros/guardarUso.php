<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlUso = $oMysql->getUsosActiveRecord();
$oUso = new UsosValueObject();

mysql_query("BEGIN;");
$error = 0;
if ($_POST['accion'] == 'Eliminar'){
    $oUso->set_idusos($_POST['iduso']);
    if(!$oMysqlUso->borrar($oUso)){
        $error = 3;
    }
} else {
    if($_POST['accion'] == 'Actualizar'){
        $oUso->set_idusos($_POST['iduso']);
    }
    $oUso->set_descripcion($_POST["uso"]);

    /* Grabacion de la Uso. */
    if($_POST['accion'] == 'Guardar') {
        if(!$oMysqlUso->guardar($oUso)){
            $error = 1;
        }
    } else {
        if(!$oMysqlUso->actualizar($oUso)){
            $error = 2;
        }
    }
}
        
//$error = 1;

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