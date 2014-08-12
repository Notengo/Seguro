<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlBarrio = $oMysql->getBarriosActiveRecord();
$oBarrio = new BarriosValueObject();
if (isset($_GET['getBarrioByLetters']) && isset($_GET['letters'])) {
    $letters = $_GET['letters'];
//    $letters = preg_replace("/[^a-z0-9 ]/si", "", $letters);
    $oBarrio->set_nombre($letters);
    $oBarrio = $oMysqlBarrio->buscarPorNombre($oBarrio);
    foreach ($oBarrio as $aBarrio) {
        echo $aBarrio->get_idbarrios() . "###" . htmlentities($aBarrio->get_nombre()) . "|";
    }
}