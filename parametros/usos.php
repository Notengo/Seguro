<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Baucher Seguros - Parametros</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>
    <body onload="document.getElementById('razonSocial').focus();">
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Parametros - Usos</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        <label class="label-success label">Uso</label><br />
                        <input class="form-control" data-toggle="tooltip" name="usos" id="usos" title="Descripci&oacute;n del uso" alt="Descripci&oacute;n del uso" placeholder="Descripci&oacute;n del uso" type="text"
                               onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" /><br/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label-success label">Item P&uacute;blico</label><br />
                        <div class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Si" /> Si
                        </div>
                        <div class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="No" /> No
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3">
                        <input type="button" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" onclick="guardarDatos()" />
                    </div>
                    <div class="col-lg-3">
                        <input type="button" id="guardar" value="Eliminar" class="btn btn-large btn-block btn-danger" onclick="guardarDatos()" />
                    </div>
                </div>
                <div class="col-lg-12" id="divResultado"></div>
            </form>
            <legend>Listado</legend>
            <table class="table table-striped table-bordered table-hover table-responsive">
                <tr>
                    <th>Id</th>
                    <th>Usos</th>
                    <th>Acciones</th>
                </tr>
            </table>
        </div>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>   
</html>