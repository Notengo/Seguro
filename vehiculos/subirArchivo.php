<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

//$imageName = mysql_real_escape_string($_FILES['image']['name']);
//$imageData = mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));
//$imageData1 = addslashes(file_get_contents($_FILES['image']['tmp_name']));
//$imageType = mysql_real_escape_string($_FILES['image']['type']);
//var_dump($_FILES);
//    

if (array_key_exists('HTTP_X_FILE_NAME', $_SERVER) && //Comprobamos que se haya subido un archivo 
        array_key_exists('CONTENT_LENGTH', $_SERVER)) { //Volvemos a comprobar que exista el archivo mirando su tamaño
    $fileName = $_SERVER['HTTP_X_FILE_NAME'];
    $contentLength = $_SERVER['CONTENT_LENGTH'];
    $contentnumero = $_SERVER['HTTP_X_File_NUMERO'];
    
} else{
    throw new Exception("Error retrieving headers");
}

//$path = '../archivos/kml_';

if (!$contentLength > 0) {
    throw new Exception('No file uploaded!');
}

//file_put_contents(//guardamos los datos recibidos en un archivo
//    $path . $fileName,
//    file_get_contents("php://input")//Tomamos los datos de la dirección temporal de php
//);

$sql = "INSERT INTO imagenes (idvehiculos, nro, foto) VALUES"
        . " (".$_GET['id'].",".$_GET['numero'].",'" . mysql_real_escape_string(file_get_contents("php://input")) . "')";
//        . " (1,10,'" . mysql_real_escape_string(file_get_contents("php://input")) . "')";
mysql_query($sql);
