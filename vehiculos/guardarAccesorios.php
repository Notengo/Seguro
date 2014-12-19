<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlAccesorio = $oMysql->getAccesoriosActiveRecord();
$oAccesorio = new AccesoriosValueObject();

if (isset($_POST['altaAccesorio'])) {
    $cliente = $_POST['idUsu'];
    $vehiculo = $_POST['idVehiculo'];
    $oAccesorio->set_idVehiculos($vehiculo);
    $oAccesorio->set_nombreA(strtoupper($_POST['nombreA']));
    $oAccesorio->set_valor($_POST['valorA']);

    $oMysqlAccesorio->guardar($oAccesorio);
    header("Location:accesorios.php?idv=$vehiculo&idc=$cliente");
//header ("Location:/seguro/vehiculos/index.php?usu=$cliente");
}

