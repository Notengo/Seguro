<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
if (isset($_GET['getLocalidadByLetters']) && isset($_GET['letters'])) {
    $letters = $_GET['letters'];
    $letters = preg_replace("/[^a-z0-9 ]/si", "", $letters);
    $sql = "SELECT idlocalidades, id_provincia, localidad FROM localidades "
            . "WHERE (localidad LIKE '%" . $letters . "%' "
            . "OR idlocalidades LIKE '%" . $letters . "%') "
            . "AND id_provincia = 9;";
    $resultado = mysql_query($sql);
    while ($inf = mysql_fetch_array($resultado)) {
        $cod = $inf["idlocalidades"];
        if ($inf['localidad'] <> null) {
            $nombre = htmlentities($inf["localidad"]);
            echo $cod . "###" . $nombre . "|";
        } /*$cod . " " . */
    }
}