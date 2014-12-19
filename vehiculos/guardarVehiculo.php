<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlVehiculo = $oMysql->getVehiculoActiveRecord();
$oVehiculo = new VehiculosValueObject();
//$oVehiculo->set_idclientes($_POST['idclientes']);
$oVehiculo->set_idclientes($_POST['cliente_ID']);
$oVehiculo->set_patente($_POST['patente']);
$oVehiculo->set_motor($_POST['motor']);
$oVehiculo->set_chacis($_POST['chasis']);
$oVehiculo->set_fechafabricacion($_POST['fabricacion']);
//$oVehiculo->set_idmarcas($_POST['idmarcas']);
//$oVehiculo->set_idmodelos($_POST['idmodelos']);
//$oVehiculo->set_idmarcas($_POST['marca_ID']);
//$oVehiculo->set_idmodelos($_POST['modelo_ID']);
$oMyMarca = $oMysql->getMarcasActiveRecord();
$oMarca = new MarcasValueObject();
$oMarca->set_descripcion($_POST['marca']);

$oMarca = $oMyMarca->buscarDescripcion($oMarca);

$oMyModelo = $oMysql->getModelosActiveRecord();
$oModelo = new ModelosValueObject();
$oModelo->set_idmarcas($oMarca->get_idmarcas());
$oModelo->set_descripcion($_POST['modelo']);
$oModelo = $oMyModelo->buscarDescripcion($oModelo);

//var_dump($oModelo);

$oVehiculo->set_idmarcas($oMarca->get_idmarcas());
$oVehiculo->set_idmodelos($oModelo->get_idmodelos());

$oVehiculo->set_version($_POST['version']);
//$oVehiculo->set_idtipos($_POST['idtipos']);
$oVehiculo->set_idtipos($_POST['tipo_ID']);
//$oVehiculo->set_idusos($_POST['idusos']);
$oVehiculo->set_idusos($_POST['uso_ID']);
$oVehiculo->set_naftero($_POST['naftero']);
$oVehiculo->set_valorasegurado($_POST['valor']);
$oVehiculo->set_patente($_POST['patente']);

mysql_query("BEGIN;");
$error = 0;

if ($_POST['accion'] == 'Eliminar') {
    $oVehiculo->set_idvehiculos($_POST['idV']);
    if (!$oMysqlVehiculo->borrar($oVehiculo)) {
        $error = 1;
    }
} elseif ($_POST['accion'] == 'Actualizar') {
    $oVehiculo->set_idvehiculos($_POST['idV']);
    if (!$oMysqlVehiculo->actualizar($oVehiculo)) {
        $error = 1;
    }
} elseif ($_POST['accion'] == 'Guardar') {
    if ($oMysqlVehiculo->buscarPatente($oVehiculo)) {
        $error = 10;
    }
    if (!$oMysqlVehiculo->guardar($oVehiculo)) {
        $error = 1;
    } else {
        ?>
        <input type="hidden" name="idVAuxiliar" id="idVAuxiliar" value="<?php echo $oVehiculo->get_idvehiculos(); ?>" />
        <?php
    }
}

/* Inicio grabacion gnc */
if (isset($_POST['gnc']) && $_POST['gnc'] == 'Si') {
    $oMysqlGnc = $oMysql->getGncActiveRecord();
    $oGnc = new GncValueObject();
    $oGnc->set_idvehiculos($oVehiculo->get_idvehiculos());
    $oGnc->set_marca($_POST['marcaReg']);
    $oGnc->set_regulador($_POST['regulador']);

    if ($_POST['accion'] == 'Actualizar') {
        /* Primero debo verificar que tenga gnc cargado. */
        $oGnc_aux = new GncValueObject();
        $oGnc_aux->set_idvehiculos($oGnc->get_idvehiculos());
        $oGnc_aux = $oMysqlGnc->buscarPorVehiculo($oGnc_aux);
        if (!$oGnc_aux) {
            if (!$oMysqlGnc->guardar($oGnc)) {
                $error = 3;
            }
        } else {
            $oGnc->set_idgnc($oGnc_aux->get_idgnc());
            if (!$oMysqlGnc->actualizar($oGnc)) {
                $error = 3;
            }
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


/* Comienzo grabacion archivos */
$oMyImagen = $oMysql->getImagenesActiveRecord();
$oImagen = new ImagenesValueObject();
$oImagen->set_idvehiculos($oVehiculo->get_idvehiculos());
$ruta = '../archivos/';
if ($_FILES['archivo1']['name'] != '') {
//$NombreOriginal = $_FILES['archivo1']['name']; //Obtenemos el nombre original del archivo
    $temporal = $_FILES['archivo1']['tmp_name']; //Obtenemos la ruta Original del archivo
    $Destino = $ruta . 'Vehiculo' . $oVehiculo->get_idvehiculos() . '1.jpg'; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo	
//$Destino = $ruta . $NombreOriginal; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo
    $oImagen->set_nro(1);
    $oImagen->set_foto('Vehiculo' . $oVehiculo->get_idvehiculos() . '1.jpg');
    $oMyImagen->guardar($oImagen);
    move_uploaded_file($temporal, $Destino);
}
if ($_FILES['archivo2']['name'] != '') {
    $temporal = $_FILES['archivo2']['tmp_name'];
    $Destino = $ruta . 'Vehiculo' . $oVehiculo->get_idvehiculos() . '2.jpg';
    $oImagen->set_nro(2);
    $oImagen->set_foto('Vehiculo' . $oVehiculo->get_idvehiculos() . '2.jpg');
    $oMyImagen->guardar($oImagen);
    move_uploaded_file($temporal, $Destino);
}
if ($_FILES['archivo3']['name'] != '') {
    $temporal = $_FILES['archivo3']['tmp_name'];
    $Destino = $ruta . 'Vehiculo' . $oVehiculo->get_idvehiculos() . '3.jpg';
    $oImagen->set_nro(3);
    $oImagen->set_foto('Vehiculo' . $oVehiculo->get_idvehiculos() . '3.jpg');
    $oMyImagen->guardar($oImagen);
    move_uploaded_file($temporal, $Destino);
}
if ($_FILES['archivo4']['name'] != '') {
    $temporal = $_FILES['archivo4']['tmp_name'];
    $Destino = $ruta . 'Vehiculo' . $oVehiculo->get_idvehiculos() . '4.jpg';
    $oImagen->set_nro(4);
    $oImagen->set_foto('Vehiculo' . $oVehiculo->get_idvehiculos() . '4.jpg');
    $oMyImagen->guardar($oImagen);
    move_uploaded_file($temporal, $Destino);
}

/* FIN grabacion archivos */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="7;URL='index.php?usu=<?php echo $_POST['cliente_ID']; ?>'" />
        <title>Seguro - Veh&iacute;culos</title>
        <script src="js/ajax-dynamic-list.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script src="js/modal.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <?php
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
                    <?php if($error == 10){$error = "La PATENTE ya se encuentra cargada";} ?>
                    <input type="text" value="Los Datos No Han Sido Almacenados. Error n° <?php echo $error; ?>" class="form-control">
                    <span class="input-icon fui-check-inverted"></span>
                </div>
                <?php
            }
            ?>
        </div>
        <?php include_once '../includes/php/footer.php'; ?>
        <script src="../bootstrap/js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>