<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlModelo = $oMysql->getModelosActiveRecord();
$oModelo = new ModelosValueObject();

mysql_query("BEGIN;");
$error = 0;
if ($_POST['accion'] == 'Eliminar'){
    $oModelo->set_idmodelos($_POST['idmodelo']);
    if(!$oMysqlModelo->borrar($oModelo)){
        $error = 3;
    }
} else {
    if($_POST['accion'] == 'Actualizar'){
        $oModelo->set_idmodelos($_POST['idmodelo']);
    }
    $oModelo->set_idmarcas($_POST['idmarca']);
    $oModelo->set_descripcion($_POST["modelo"]);

    /* Grabacion de la Marca. */
    if($_POST['accion'] == 'Guardar') {
        if(!$oMysqlModelo->guardar($oModelo)){
            $error = 1;
        }
    } else {
        if(!$oMysqlModelo->actualizar($oModelo)){
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