<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$sql = "Select foto from imagenes WHERE idvehiculos = 1 AND nro = 1";
$resultado = mysql_query($sql);
$resultado = mysql_fetch_array($resultado);

header("Content-Type: image/jpeg");
echo trim($resultado[0]);