<?php
session_start();
include_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$usuario = mysql_escape_string($_POST['user']);
$pass = mysql_escape_string($_POST['pass']);
$usuario2 = strtolower($usuario);
$pass2 = strtolower($pass);
//$_SESSION['pass'] = $pass;
if ($usuario2 == "" || $pass2 == "") {
    ?>
    <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="alert alert-warning">Faltan ingresar datos para Ingresar</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <input type="button" class="btn btn-large btn-danger" value="Reintentar" onclick="window.location = '../includes/php/logout.php'" />
            </div>
        </div>
    </div>
    <?php
} else {
    $sql = "SELECT * FROM usuarios WHERE usuarios.nombreUser='"
            . $usuario2 . "' AND usuarios.pass='" . $pass2 . "'";

    $resultado = mysql_query($sql) or die(false);
    if (mysql_fetch_row($resultado) > 0) {
        $variable = mysql_fetch_array($resultado);

        $_SESSION['usuario'] = $variable[0];
        $_SESSION['contrasenia'] = $variable[1];
        $_SESSION['nombre'] = $variable[2];
        $_SESSION['apellido'] = $variable[3];
        $_SESSION['nroProductor'] = $variable[4];
        $_SESSION['idsesion'] = session_id();

        header("Location:../inicio/index.php");
    } else {
        ?>
        <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="alert alert-warning">los datos no coinciden con un usuario registrado</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <input type="button" class="btn btn-large btn-danger" value="Reintentar" onclick="window.location = '../includes/php/logout.php'" />
                </div>
            </div>
        </div>
        <?php
    }
}