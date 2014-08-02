<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Baucher Seguros - Clientes</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>
    <body onload="document.getElementById('razonSocial').focus();">
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Compa&ntilde;ias</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        <label class="label-success label">Razon Social</label><br />
                        <input class="form-control" data-toggle="tooltip" name="razonSocial" id="razonSocial" title="Razon Social de la Compa&ntilde;ia" alt="Razon Social de la Compa&ntilde;ia" placeholder="Razon Social de la Compa&ntilde;ia" type="text"
                               onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" /><br/>
                        <input type="hidden" id="dependencia_hidden" name="dependencia_ID" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label-success label">N&ordm; de Productor</label><br />
                        <input class="form-control" data-toggle="tooltip" name="duracion" id="duracion" title="Duraci&oacute;n dentro de la oficina" alt="Duraci&oacute;n dentro de la oficina" type="number" min="0" value="7" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">CUIT</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?= $orden; ?>" value="<?= $orden; ?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-8">
                        <label class="label-success label">Calle</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?= $orden; ?>" value="<?= $orden; ?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label-success label">N&ordm;</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?= $orden; ?>" value="<?= $orden; ?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">Piso</label><br />
                        <input class="form-control" data-toggle="tooltip" name="duracion" id="duracion" title="Duraci&oacute;n dentro de la oficina" alt="Duraci&oacute;n dentro de la oficina" type="number" min="0" value="7" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">Dpto</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?= $orden; ?>" value="<?= $orden; ?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">C.P.</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?= $orden; ?>" value="<?= $orden; ?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">N&ordm; Tel&eacute;fono</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?= $orden; ?>" value="<?= $orden; ?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-5">
                        <label class="label-success label">Correo Electronico</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="email" min="1" max="<?= $orden; ?>" value=""  /><br/>
                    </div>
                    <div class="col-lg-5">
                        <label class="label-success label">Link</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="url" min="1" max="<?= $orden; ?>" value=""  /><br/>
                    </div>
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
                    <th>Razon Socail</th>
                    <th>Acciones</th>
                </tr>
            </table>
        </div>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>   
</html>