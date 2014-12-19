<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlUsuarioCompania = $oMysql->getUsuarioCompaniaActiveRecord();
$oUsuarioCom = new UsuarioCompaniaValueObject();

$oMysqlUsuario = $oMysql->getUsuarioActiveRecord();
$oUsuario = new UsuarioValueObject();

if(isset($_GET['tipo']))
{
 
    $_idUsuario = $_GET['eliminado'];
    $oUsuario->set_idUsuario($_idUsuario);
    $oUsuario = $oMysqlUsuario->borrar($oUsuario);
    
    ?>

    <head>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    </head>
    <body>
    <div class='container'>
        
    <div class="row hads-success">
        <input type="text" value="Se ha eliminado Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
        
        <br>
        <div class="row">
        <div class="col-lg-2">
        <input type="button" class="form-control btn btn-primary" value="Aceptar" onclick="window.location.href='index.php'">       
        </div>    
        </div>    
    </div>
    </div>    
   </body>
    <?php
}elseif (isset ($_GET['modificar'])) {
    $_nombreUser = $_GET['usuario'];
    $_pass = $_GET['password'];
    $nombreReal = $_GET['nombre'];
    $_apellidoReal = $_GET['apellido'];
    $_idUsuario = $_GET['id'];
    unset($oUsuario);
    $oMysqlUsuario = $oMysql->getUsuarioActiveRecord();
    $oUsuario = new UsuarioValueObject();
    $oUsuario->set_idUsuario($_idUsuario);
    $oUsuario->setNombreReal($nombreReal);
    $oUsuario->set_apellidoReal($_apellidoReal);
    $oUsuario->set_nombreUser($_nombreUser);
    $oUsuario->set_pass($_pass);
    $oMysqlUsuario->actualizar($oUsuario);
    ?>
     <head>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../bootstrap/js/bootstrap.js" type="text/javascript"></script>
    </head>
    <body>
    <div class='container'>
        
    <div class="row hads-success">
        <input type="text" value="Se ha Modificado Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
        
        <br>
        <div class="row">
        <div class="col-lg-2">
        <input type="button" class="form-control btn btn-primary" value="Aceptar" onclick="window.location.href='index.php'">       
        </div>    
        </div>    
    </div>
    </div>    
   </body>
   <?php
}
   