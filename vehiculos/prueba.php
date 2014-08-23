<form action="prueba.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="image" />
    <input type="button" onclick="alert(document.getElementById('image').value);" />
    <!--<input type="submit" name="submit" value="upload" />-->
</form>

<?php
if(isset($_POST['submit'])){
    require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

    $oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
    $oMysql->conectar();
   
    $imageName = mysql_real_escape_string($_FILES['image']['name']);
    $imageData = mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));
    $imageType = mysql_real_escape_string($_FILES['image']['type']);
    var_dump($_FILES);
//    mysql_query("INSERT INTO imagenes Value (1,2, '".$imageData."')");
}
