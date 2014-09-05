<?php
//$id= $_GET['usu'];
//echo "$id";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Poliza</title>
        <script src="js/ajax-dynamic-list.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="document.getElementById('poliza').focus();">
        <?php include '../includes/php/header.php'; ?>
        <div class="container">
            <div>
                <legend>Poliza</legend>
                <div id="nuevo" class="oculto">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="label label-success">Nº de Poliza</label>
                            <input type="text" name="poliza" id="poliza" class="form-control"/>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <label class="label label-success">Compañ&iacute;a</label>
                            <input type="text" name="compania" id="compania" class="form-control" placeholder="Nombre de la compa&ntilde;ia"/>
                            <input type="hidden" name="compania_ID" id="compania_hidden"/>
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <div class="glyphicon glyphicon-plus"></div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="label label-success">Cliente</label>
                            <input type="text" name="cliente" id="cliente" class="form-control" placeholder="Apellido, Nombre"/>
                            <input type="hidden" name="cliente_ID" id="cliente_hidden" />
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <div class="glyphicon glyphicon-plus"></div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-2">
                            <label class="label label-success">Patente</label>
                            <input type="text" name="patente" id="patente" class="form-control" placeholder="seleccione"/>
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <div class="glyphicon glyphicon-plus"></div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-2">
                            <label class="label label-success">Cobertura</label>
                            <select name="cobertura" id="cobertura" class="form-control" >
                                <option value="0">Seleccione</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <div class="glyphicon glyphicon-plus"></div>
                        </div>

                        <div class="col-lg-1"></div>

                        <div class="col-lg-4">
                            <label class="label label-success">Otros Riesgos</label>
                            <select name="otroRiesgo" id="otroRiesgo" class="form-control" >
                                <option value="0">Ninguno</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <div class="glyphicon glyphicon-plus"></div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <!--<legend>-->
                        <h5>Vigencia</h5>
                        <!--</legend>-->
                        <div class="col-lg-2">
                            <label class="label label-success">desde</label>
                            <input type="date" name="desde" id="desde" class="form-control" value="<?php echo date('Y-m-d'); ?>"/>
                        </div>
                        <div class="col-lg-2">
                            <label class="label label-success">hasta</label>
                            <input type="date" name="hasta" id="hasta" class="form-control" value="<?php echo (date('m') >= 6) ? date('Y-') . "12-31" : date('Y-') . "06-30"; ?>"/>
                        </div>

                        <div class="col-lg-1">
                            <label class="label label-success">2&ordm; Vencimiento</label>
                            <input type="text" name="vencimiento2" id="vencimiento2" class="form-control" onkeypress="return soloNumeros(event);" />
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-2">
                            <label class="label label-success">Premio</label>
                            <input type="text" name="premio" id="premio" class="form-control" onkeypress="return soloNumeros(event);"/>
                        </div>


                        <div class="col-lg-2">
                            <label class="label label-success">Prima</label>
                            <input type="text" name="prima" id="prima" class="form-control" onkeypress="return soloNumeros(event);"/>
                        </div>


                        <div class="col-lg-1">
                            <label class="label label-success">Cuotas</label>
                            <input type="number" name="cuota" id="cuota" class="form-control" onkeypress="return soloNumeros(event);" value="<?php echo (date('m') >= 6) ? 12 - date('m') : 6 - date('m'); ?>"/>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-3">
                            <label class="label label-success">Forma de Pago</label>
                            <select name="formapago" id="formapago" class="form-control" >
                                <option value="0">Ninguno</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="col-lg-1">
                            <br>
                            <div class="glyphicon glyphicon-plus"></div>
                        </div>

                        <div class="col-lg-4">
                            <label class="label label-success">Nº CBU o TC</label>
                            <input type="text" name="cbu" id="cbu" class="form-control"/>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <input type="button" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="guardarDatos();" />
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="cancelar" value="Cancelar" class="oculto" onclick="location.reload();" />
                    </div>
                    <div class="col-sm-8" id="divResultado"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <legend>Listado &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
            </div>
            <?php include_once './listadoPoliza.php'; ?>   
        </div>
    </body>    
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>
