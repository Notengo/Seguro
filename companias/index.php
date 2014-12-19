<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Baucher Seguros - Clientes</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <!--        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">-->
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body onload="document.getElementById('razonSocial').focus();">
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <legend>Compa&ntilde;ias</legend>
            <div id="nuevo" class="oculto">
                <?php include 'index2.php'; ?>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <input type="button" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="guardarDatos();" />
                </div>
                <div class="col-sm-2">
                    <input type="button" id="cancelar" value="Cancelar" class="oculto" onclick="location.reload();" />
                </div>
                <div class="col-sm-8" id="divResultado"></div>
            </div>
            <br>

            <legend>Listado</legend>
            <div table-responsive>
                <?php include_once './listadoCompanias.php';?>
            </div>
        </div>
        <br>
        <br>
        <?php include_once '../includes/php/footer.php';?>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>

