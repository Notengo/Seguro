<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlUsuarioCompania = $oMysql->getUsuarioCompaniaActiveRecord();
$oUsuarioCom = new UsuarioCompaniaValueObject();

$_idUsuario = $_GET['idu'];
$_idCompania = $_GET['idc'];
$razonsocial = $_GET['razons'];
$nrp = $_GET['nrop'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Productores Modificar</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script src="js/funcion.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
     <div class="container">
         <form action="accionesNroProductor.php" method="get">  
            <legend>Modificar Nº de Productor</legend>
                <br>
                <div class="row">
                    <div class="col-sm-5 col-lg-5">
                        <label class="label-success label">Id Usuario</label>
                        <input class="form-control" data-toggle="tooltip" name="idusuario" id="idusuario" title="idusuario" alt="idusuario"  type="text" value="<?php echo $_idUsuario?>" disabled=""/>
                    </div> 
                    <div class="col-sm-5 col-lg-5">
                        <label class="label-success label">Compa&ntilde;ia</label>
                        <input class="form-control" data-toggle="tooltip" name="compania" id="apellido" title="compania" alt="compania"  type="text" value="<?php echo $razonsocial?>" disabled=""/>
                    </div> 
                </div>
                <br>
                <div class="row">
                 <div class="col-sm-5 col-lg-5">
                        <label class="label-success label">Nª</label>
                        <input class="form-control" data-toggle="tooltip" name="nroP" id="nroP" title="numero Productor" alt="numero Productor" type="text" value="<?php echo $nrp?>" />
                 </div> 
                </div>
                <br>
                <div class="row">
                <div class="col-sm-2">
                    <input type="hidden" name="tipo" id="tipo" value="modificar"  />
                    <input type="hidden" name="idU" id="idU" value="<?php echo $_idUsuario?>"  />
                    <input type="hidden" name="idc" id="idc" value="<?php echo $_idCompania?>"  />
                    <input type="submit" name="modificar" id="modificar" value="Modificar" class="btn btn-large btn-block btn-primary" />
                </div>
                <div class="col-sm-2">
                    <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary" onclick="window.history.back()"/>
                </div>
              
            </div>
        
        </form> 
 
</div>
    <br>
    <?php include_once '../includes/php/footer.php'; ?>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>