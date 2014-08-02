<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Baucher Seguros - Correcci&oacute;n pago Planillas</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>
    <body onload="document.getElementById('razonSocial').focus();">
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Correcci&oacute;n pago Planillas</legend>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="label-success label">N&ordm; poliza</label><br />
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label-success label">Fecha</label><br />
                        <input class="form-control" data-toggle="tooltip" name="planilla" id="planilla" title="Fecha" alt="Fecha" type="date" />
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">Monto</label><br />
                        <input class="form-control" data-toggle="tooltip" name="monto" id="monto" title="Monto" alt="Monto" placeholder="Monto" type="text" />
                        <input type="hidden" id="modelo_hidden" name="modelo_ID" value="" />
                    </div>
<!--                </div>
                <div class="form-group">-->
                    <div class="col-lg-2">
                        <label class="label-success label">Pagado</label><br />
                        <div class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Si" /> Si
                        </div>
                        <div class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="No" /> No
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-5">
                        <label class="label-success label">Nombre</label><br />
                        <input class="form-control" data-toggle="tooltip" name="nombre" id="nombre" title="Nombre" alt="Nombre" placeholder="Nombre" type="text"
                               onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" />
                        <input type="hidden" id="modelo_hidden" name="modelo_ID" value="" />
                    </div>
                </div>
<!--                <div class="form-group">
                    <div class="col-lg-5">
                        <label class="label-success label">Monto</label><br />
                        <input class="form-control" data-toggle="tooltip" name="monto" id="monto" title="Monto" alt="Monto" placeholder="Monto" type="text" />
                        <input type="hidden" id="modelo_hidden" name="modelo_ID" value="" />
                    </div>
                </div>-->
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
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Cuota</td>
                    <td>Modificar/Eliminar</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Cuota</td>
                    <td>Modificar/Eliminar</td>
                </tr>
            </table>
        </div>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>   
</html>