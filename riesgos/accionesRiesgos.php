<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlRiesgos = $oMysql->getOtrosRiesgosActiveRecord();
$oRiesgos = new OtrosRiesgosValueObject();

if($_GET['tipo']=='delete')
{ 
$eliminado = $_GET['idR'];  
$oRiesgos->set_idotrosriesgos($eliminado);
$oRiesgos = $oMysqlRiesgos->borrar($oRiesgos);

header ("Location:index.php");
}
elseif($_GET['tipo']=='edit')
{
  $idr = $_GET['idR']; 
  $nombre = $_GET['nombreR'];
  $descripcion = $_GET['descr'];
  $oRiesgos->set_idotrosriesgos($idr);
  $oRiesgos->set_nombre($nombre);
  $oRiesgos->set_descripcion($descripcion);
  
  $oMysqlRiesgos->actualizar($oRiesgos);
  header ("Location:index.php");
}
?>