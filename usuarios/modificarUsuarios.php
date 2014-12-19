<?php
if($_GET['tipo']=='modi')
{
 $idusuario = $_GET['idu'];   
 $nombre = $_GET['nombreu'];
 $apellido = $_GET['apellidou'];
}

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
         <form action="accionesUsuarios.php" method="get">  
            <legend>Modificar Productor</legend>
                <div class="row">
                    <div class="col-sm-4 col-lg-5">
                        <!--<label class="label-success label">Usuario</label>-->
                        <input class="form-control" data-toggle="tooltip" name="usuario" id="usuario" title="Usuario" alt="usuario" placeholder="Usuario.." type="hidden" value="pr0duc10r3s"/>
                    </div>
                    <div class="col-sm-5 col-lg-5">
                        <!--<label class="label-success label">Password</label>-->
                        <input class="form-control" data-toggle="tooltip" name="password" id="password" title="Password" alt="Password" placeholder="Password.." type="hidden" value="pr0duc10r3s"/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-5 col-lg-5">
                        <label class="label-success label">Nombre</label>
                        <input class="form-control" data-toggle="tooltip" name="nombre" id="nombre" title="nombre" alt="nombre" type="text" value="<?php echo$nombre?>" />
                    </div> 
                    <div class="col-sm-5 col-lg-5">
                        <label class="label-success label">Apellido</label>
                        <input class="form-control" data-toggle="tooltip" name="apellido" id="apellido" title="apellido" alt="apellido" type="text" value="<?php echo$apellido?>"/>
                        <input class="form-control" data-toggle="tooltip" name="id" type="hidden" value="<?php echo$idusuario?>"/>
                    </div> 
                </div>
                <br>
                <br>
                <div class="row">
                <div class="col-sm-2">
                    <input type="submit" name="modificar" id="modificar" value="modificar" class="btn btn-large btn-block btn-primary" />
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