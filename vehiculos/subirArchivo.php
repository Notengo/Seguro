<?php

set_time_limit(0);
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();


if ($_POST) {
// Creamos la cadena aletoria 
    $cad = "Vehiculo" . $_GET['id'] . $_GET['numero'];

// Fin de la creacion de la cadena aletoria 

    $destino = '../archivos'; // Carpeta donde se guardata 
    $sep = explode('image/', $_FILES["file"]["type"]); // Separamos image/ 
    $tipo = $sep[1]; // Optenemos el tipo de imagen que es 

    if ($tipo == "image/jpeg" || $tipo == "jpeg") { // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
        move_uploaded_file($_FILES ['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo);  // Subimos el archivo 
//        include('post.html'); // Incluimos la plantilla 
    } else
        echo "el tipo de archivo no es de los permitidos" . $_FILES["file"]["type"]; // Si no es el tipo permitido lo desimos 
}


//if (array_key_exists('HTTP_X_FILE_NAME', $_SERVER) && //Comprobamos que se haya subido un archivo 
//        array_key_exists('CONTENT_LENGTH', $_SERVER)) { //Volvemos a comprobar que exista el archivo mirando su tamaño
//    $fileName = $_SERVER['HTTP_X_FILE_NAME'];
//    $contentLength = $_SERVER['CONTENT_LENGTH'];
//    $contentnumero = $_SERVER['HTTP_X_File_NUMERO'];
//} else {
//    throw new Exception("Error retrieving headers");
//}
//
//if (!$contentLength > 0) {
//    throw new Exception('No file uploaded!');
//}
//
//$fp = fopen("../archivos/Vehiculo" . $_GET['id'] . $_GET['numero'] . ".jpg", "wb");
//fwrite($fp, file_get_contents("php://input"));
//fclose($fp);
//
//$sql = "INSERT INTO imagenes (idvehiculos, nro, foto) VALUES"
//        . " (" . $_GET['id'] . "," . $_GET['numero'] . ",'Vehiculo" . $_GET['id'] . $_GET['numero'] . ".jpg')";
////        . " (" . $_GET['id'] . "," . $_GET['numero'] . ",'" . mysql_real_escape_string(file_get_contents("php://input")) . "')";
//
//mysql_query($sql);










//set_time_limit(0);
//require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
//$oMysql->conectar();
//
//$sql = "INSERT INTO imagenes (idvehiculos, nro, foto) VALUES"
//        . " (" . $_GET['id'] . ", 100,'Vehiculo" . $_GET['id'] . $_GET['numero'] . ".jpg')";
//mysql_query($sql);
//
//if (array_key_exists('HTTP_X_FILE_NAME', $_SERVER) && //Comprobamos que se haya subido un archivo 
//        array_key_exists('CONTENT_LENGTH', $_SERVER)) { //Volvemos a comprobar que exista el archivo mirando su tamaño
//    $fileName = $_SERVER['HTTP_X_FILE_NAME'];
//    $contentLength = $_SERVER['CONTENT_LENGTH'];
//    $contentnumero = $_SERVER['HTTP_X_File_NUMERO'];
//} else {
//    throw new Exception("Error retrieving headers");
//}
//
//if (!$contentLength > 0) {
//    throw new Exception('No file uploaded!');
//}
//
//$fp = fopen("../archivos/Vehiculo" . $_GET['id'] . $_GET['numero'] . ".jpg", "wb");
//fwrite($fp, file_get_contents("php://input"));
//fclose($fp);
//
//$sql = "INSERT INTO imagenes (idvehiculos, nro, foto) VALUES"
//        . " (" . $_GET['id'] . "," . $_GET['numero'] . ",'Vehiculo" . $_GET['id'] . $_GET['numero'] . ".jpg')";
////        . " (" . $_GET['id'] . "," . $_GET['numero'] . ",'" . mysql_real_escape_string(file_get_contents("php://input")) . "')";
//
//mysql_query($sql);
