<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlAccesorio = $oMysql->getAccesoriosActiveRecord();
$oAccesorio = new AccesoriosValueObject();

if(isset($_POST['edit']))
{    
    $cliente = $_POST['idUsu'];
    $vehiculo = $_POST['idVehiculo'];
    $nombre = $_POST['nombreA'];
    $valor = $_POST['valorA'];
    $accesorio = $_POST['idAccesorio'];
    
    $oAccesorio->set_idVehiculos($vehiculo);
    $oAccesorio->set_nombreA($nombre);
    $oAccesorio->set_valor($valor);
    $oAccesorio->set_idAccesorios($accesorio);

    $oMysqlAccesorio->actualizar($oAccesorio);
    header ("Location:accesorios.php?idv=$vehiculo&idc=$cliente");
}
if(isset($_GET['tipo']))
{if($_GET['tipo']=='delete') {
        $vehiculo = $_GET['idv'];
        $accesorio = $_GET['ida'];
        $cliente = $_GET['idc'];
        $oAccesorio->set_idAccesorios($accesorio);
        $oMysqlAccesorio->borrar($oAccesorio);
        header ("Location:accesorios.php?idv=$vehiculo&idc=$cliente");
}
}
