<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Baucher Seguros - Parametros</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form class="form-horizontal" name="formulario">
                <legend>Parametros - Marcas</legend>
                <div class="form-group oculto" id="nuevo">
                    <div class="col-sm-12">
                        <label class="label-success label">Marca</label><br />
                        <input class="form-control" data-toggle="tooltip" name="marca" id="marca" title="Descripci&oacute;n de la marca" alt="Descripci&oacute;n de la marca" placeholder="Descripci&oacute;n de la marca" type="text"
                               onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" /><br/>
                        <input type="hidden" id="marca_hidden" name="marca_ID" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">
                        <input type="button" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="guardarDato();" />
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary oculto" onclick="location.reload();" />
                    </div>
                    <div class="col-sm-8" id="divResultado"></div>
                </div>
            </form>
            <legend>Listado</legend>
            <div id="listado" class="table-responsive">
                <?php include 'listadoMarcas.php'; ?>
            </div>
        </div>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>   
</html>