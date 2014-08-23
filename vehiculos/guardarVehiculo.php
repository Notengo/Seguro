<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlVehiculo = $oMysql->getVehiculoActiveRecord();
$oVehiculo = new VehiculosValueObject();
$oVehiculo->set_idclientes($_POST['idclientes']);
$oVehiculo->set_patente($_POST['patente']);
$oVehiculo->set_motor($_POST['motor']);
$oVehiculo->set_chacis($_POST['chasis']);
$oVehiculo->set_fechafabricacion($_POST['fabricacion']);
$oVehiculo->set_idmarcas($_POST['idmarcas']);
$oVehiculo->set_idmodelos($_POST['idmodelos']);
$oVehiculo->set_version($_POST['version']);
$oVehiculo->set_idtipos($_POST['idtipos']);
$oVehiculo->set_idusos($_POST['idusos']);
$oVehiculo->set_naftero($_POST['naftero']);
$oVehiculo->set_valorasegurado($_POST['valor']);
$oVehiculo->set_patente($_POST['patente']);

//$oMysqlUso = $oMysql->getUsosActiveRecord();
//$oUso = new UsosValueObject();

mysql_query("BEGIN;");
$error = 0;
if ($_POST['accion'] == 'Eliminar'){
    $oVehiculo->set_idvehiculos($_POST['idvehiculos']);
    if(!$oMysqlVehiculo->borrar($oVehiculo)){
        $error = 1;
    }
} elseif ($_POST['accion'] == 'Actualizar') {
    $oVehiculo->set_idvehiculos($_POST['idvehiculos']);
    if (!$oMysqlVehiculo->actualizar($oVehiculo)) {
        $error = 1;
    }
} elseif ($_POST['accion'] == 'Guardar') {
    if (!$oMysqlVehiculo->guardar($oVehiculo)) {
        $error = 1;
    } else {
        ?>
        <input type="hidden" name="idV" id="idV" value="<?php echo $oVehiculo->get_idvehiculos();?>" />
        <?php
    }
}

/* Inicio grabacion gnc */
if (isset($_POST['gnc']) == 'Si') {
    $oMysqlGnc = $oMysql->getGncActiveRecord();
    $oGnc = new GncValueObject();
    $oGnc->set_idvehiculos($oVehiculo->get_idvehiculos());
    $oGnc->set_marca($_POST['marcaReg']);
    $oGnc->set_regulador($_POST['regulador']);
    
    if ($_POST['accion'] == 'Actualizar') {
        if (!$oMysqlGnc->actualizar($oGnc)) {
            $error = 3;
        }
    } elseif ($_POST['accion'] == 'Guardar') {
        if (!$oMysqlGnc->guardar($oGnc)) {
            $error = 3;
        }
    }
    
    $oMysqlCilindro = $oMysql->getCilindrosActiveRecord();
    $oCilindro1 = new CilindrosValueObject($_POST['numeroC1'], $_POST['marcaC1'], $oVehiculo->get_idvehiculos());
    $oCilindro2 = new CilindrosValueObject($_POST['numeroC2'], $_POST['marcaC2'], $oVehiculo->get_idvehiculos());
    $oCilindro3 = new CilindrosValueObject($_POST['numeroC3'], $_POST['marcaC3'], $oVehiculo->get_idvehiculos());
    if ($_POST['accion'] == 'Actualizar') {
//        if (!$oMysqlGnc->actualizar($oGnc)) {
//            $error = 3;
//        }
    } elseif ($_POST['accion'] == 'Guardar') {
        if ($_POST['numeroC1'] != '' && $_POST['marcaC1'] != '') {
            if (!$oMysqlCilindro->guardar($oCilindro1)) {
                $error = 41;
            }
        }
        if ($_POST['numeroC2'] != '' && $_POST['marcaC2'] != '') {
            if (!$oMysqlCilindro->guardar($oCilindro2)) {
                $error = 42;
            }
        }
        if ($_POST['numeroC3'] != '' && $_POST['marcaC3'] != '') {
            if (!$oMysqlCilindro->guardar($oCilindro3)) {
                $error = 43;
            }
        }
    }
}           
/* Fin grabacion gnc */


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