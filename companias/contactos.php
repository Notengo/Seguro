<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Baucher Seguros - Contactos</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    </head>
    <body onload="document.getElementById('apellido').focus();">
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form class="form-horizontal">
                <legend>Contactos</legend>
                <div class="form-group">
                    <div class="col-lg-4">
                        <label class="label-success label">Apellido</label><br />
                        <input class="form-control" data-toggle="tooltip" name="apellido" id="apellido" title="Apellido de contacto" alt="Apellido de contacto" placeholder="Apellido de contacto" type="text" />
                    </div>
                    <div class="col-lg-5">
                        <label class="label-success label">Nombre</label><br />
                        <input class="form-control" data-toggle="tooltip" name="nombre" id="nombre" title="Nombre de contacto" alt="Nombre de contacto" placeholder="Nombre de contacto" type="text" />
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Compa&ntilde;ia</label><br />
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
                        <label class="label-success label">N&ordm; Tel&eacute;fono</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?= $orden; ?>" value="<?= $orden; ?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-1">
                        <label class="label-success label">Interno</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="number" min="1" max="<?= $orden; ?>" value="<?= $orden; ?>" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-4">
                        <label class="label-success label">Correo Electronico</label><br />
                        <input class="form-control" data-toggle="tooltip" name="orden" id="orden" title="Orden de oficina" alt="Orden de oficina" type="email" min="1" max="<?= $orden; ?>" value=""  /><br/>
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Cargo</label><br />
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
            <table class="table table-striped table-bordered table-hover">
                <tr class="success">
                    <th>Id</th>
                    <th>Apellido y nombre</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <td>01</td>
                    <td>Vergara, Leonardo Javier</td>
                    <td>iconos</td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Remedi, Rolando Martin</td>
                    <td>iconos</td>
                </tr>
            </table>
        </div>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>   
</html>