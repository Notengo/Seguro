<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if (isset($_GET['getModeloByLetters']) && isset($_GET['letters'])) {
    $valores = explode("-", $_GET['letters']);
    $letters = $_GET['letters'];
    $letters = preg_replace("/[^a-z0-9 ]/si", "", $letters);
    $sql = "SELECT idmodelos, descripcion "
            . "FROM `modelos`"
            . "WHERE (descripcion LIKE '%" . $letters . "%' "
            . "AND idmarcas = ".$_GET['filtro'].");";
//            . "AND baja IS NULL;";
    $resultado = mysql_query($sql);
    while ($inf = mysql_fetch_array($resultado)) {
        $cod = $inf["idmodelos"];
        if ($inf['descripcion'] <> null) {
            $descripcion = utf8_encode($inf["descripcion"]);
            echo $cod . "###" . $descripcion . "|";
        }
    }
}