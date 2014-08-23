<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if (isset($_GET['getClienteByLetters']) && isset($_GET['letters'])) {
    $letters = $_GET['letters'];
    $letters = preg_replace("/[^a-z0-9 ]/si", "", $letters);
    $sql = "SELECT idclientes, apellido, nombre "
            . "FROM clientes "
            . "WHERE (nombre LIKE '%" . $letters . "%' "
            . "OR apellido LIKE '%" . $letters . "%') "
            . "AND baja IS NULL;";
    $resultado = mysql_query($sql);
    while ($inf = mysql_fetch_array($resultado)) {
        $cod = $inf["idclientes"];
        if ($inf['apellido'] <> null) {
            $nombre = utf8_encode($inf["apellido"]) . ", " . utf8_encode($inf["nombre"]);
            echo $cod . "###" . $nombre . "|";
        }
    }
}