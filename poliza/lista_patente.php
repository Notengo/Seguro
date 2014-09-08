<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if (isset($_GET['getPatenteByLetters']) && isset($_GET['letters'])) {
    $letters = $_GET['letters'];
    $letters = preg_replace("/[^a-z0-9 ]/si", "", $letters);
//    $sql = "SELECT patente, m.descripcion as marca, mo.descripcion as modelo, version "
    $sql = "SELECT patente "
            . "FROM vehiculos v "
//            . "LEFT JOIN marcas m ON m.idmarcas = v.idmarcas "
//            . "LEFT JOIN modelos mo ON mo.idmarcas = v.idmarcas AND mo.idmodelos = v.idmodelos "
            . "WHERE (patente LIKE '%" . $letters . "%');";
    $resultado = mysql_query($sql);
    while ($inf = mysql_fetch_array($resultado)) {
        $cod = $inf["patente"];
        $dato = utf8_encode($inf["patente"]);
//                . ", "
//                . utf8_encode($inf["marca"]) . ", "
//                . utf8_encode($inf["modelo"]). ", "
//                . utf8_encode($inf["version"]);
        echo $cod . "###" . $dato . "|";
    }
}