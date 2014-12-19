<?php

include_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if(isset($_GET['idc']))
{
$compania = $_GET['idc'];
$oMysqlCompania = $oMysql->getCompaniaActiveRecord();
$oCompania = new CompaniasValueObject();
$oCompania->set_idcompanias($compania);
$oCompania = $oMysqlCompania->borrar($oCompania);
header ("Location:index.php");
}