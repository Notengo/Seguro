<?php
if ($_POST) {
// Creamos la cadena aletoria 
    $str = "ABC";
    $cad = "";
    for ($i = 0; $i < 12; $i++) {
        $cad .= substr($str, rand(0, 62), 1);
    }
// Fin de la creacion de la cadena aletoria 
    $tamano = $_FILES ['file']['size']; // Leemos el tamaño del fichero 
    $tamaño_max = "50000000000"; // Tamaño maximo permitido 
    if ($tamano < $tamaño_max) { // Comprovamos el tamaño  
    $destino = '../archivos' ; // Carpeta donde se guardata 
    $sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/ 
        $tipo = $sep[1]; // Optenemos el tipo de imagen que es 
        var_dump($tipo);
        var_dump($sep);
        if ($tipo == "image/jpeg" || $tipo == "jpeg") { // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
            move_uploaded_file($_FILES ['file']['tmp_name'], $destino . '/' . $cad . '.' . $tipo);  // Subimos el archivo 
            include('post.html'); // Incluimos la plantilla 
        } else
            echo "el tipo de archivo no es de los permitidos" . $_FILES["file"]["type"]; // Si no es el tipo permitido lo desimos 
    } else
        echo "El archivo supera el peso permitido."; // Si supera el tamaño de permitido lo desimos 
}