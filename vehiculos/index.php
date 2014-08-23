<?php
// Se requieren los script para acceder a los datos de la DB
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Veh&iacute;culos</title>
        <script src="js/ajax-dynamic-list.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form name="vehiculo" class="form-horizontal" action="#" method="post" autocomplete="off">
                <legend>Agregando Vehiculos</legend>
                <div id="nuevo" style="display: none;">
                    <div class="row">
                        <div class="col-sm-8">
                            <label class="label-success label">Cliente</label>    
                            <input type="text" name="cliente" id="cliente" class="form-control" data-toggle="tooltip" 
                                   placeholder="Cliente Asegurado" title="Cliente Asegurado" alt="Cliente Asegurado"
                                   onkeyup="ajax_showOptionsCliente(this,'getClienteByLetters',event);" />
                            <input type="hidden" name="cliente_ID" id="cliente_hidden"value="" />
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <label class="label-success label">Patente</label>    
                            <input type="text" name="patente" id="patente" class="form-control"/>
                        </div>
                        <div class="col-lg-4">
                            <label class="label-success label">Nº Motor</label>    
                            <input type="text" name="motor" id="motor" class="form-control"/>
                        </div>
                        <div class="col-lg-4">
                            <label class="label-success label">Nº Chasis</label>    
                            <input type="text" name="chasis" id="chasis" class="form-control"/>
                        </div> 
                        <div class="col-lg-2">
                            <label class="label-success label">Año de Fabricaci&oacute;n</label>    
                            <input type="date" name="fabricacion" id="fabricacion" class="form-control"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="label-success label">Marca</label> 
                            <input type="text" name="marca" id="marca" class="form-control" data-toggle="tooltip" title="Marca del Vehiculo" alt="Marca del Vehiculo" placeholder="seleccione"
                                   onkeyup="ajax_showOptionsMarca(this,'getMarcaByLetters',event);" />
                            <input type="hidden" name="marca_ID" id="marca_hidden"value="" />
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <a href="marcas.php">
                                <div class="glyphicon glyphicon-plus"></div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <label class="label-success label">Modelo</label>    
                            <input type="text" name="modelo" id="modelo" class="form-control" data-toggle="tooltip" title="Modelo Vehiculo" alt="Modelo Vehiculo"
                                   onkeyup="ajax_showOptionsModelo(this,'getModeloByLetters',event);" />
                            <input type="hidden" name="modelo_ID" id="modelo_hidden"value="" />
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <a href="modelos.php">
                                <div class="glyphicon glyphicon-plus"></div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <label class="label-success label">Version</label>    
                            <input type="text" name="version" id="version" class="form-control" data-toggle="tooltip" title="version del Vehiculo" alt="Version del Vehiculo"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">  
                        <div class="col-lg-3">
                            <label class="label-success label">Tipo</label>
                            <input type="text" name="tipo" id="tipo" class="form-control" placeholder="seleccione"
                                   onkeyup="ajax_showOptionsTipo(this,'getTipoByLetters',event);" />
                            <input type="hidden" name="tipo_ID" id="tipo_hidden"value="" />
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <a href="tipos.php">
                                <div class="glyphicon glyphicon-plus"></div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <label class="label-success label">Uso</label>
                            <input type="text" name="uso" id="uso" class="form-control" placeholder="seleccione"
                                   onkeyup="ajax_showOptionsUso(this,'getUsoByLetters',event);" />
                            <input type="hidden" name="uso_ID" id="uso_hidden"value="" />
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <!--<div class="glyphicon glyphicon-plus"></div>-->
                            <a href="usos.php">
                                <div class="glyphicon glyphicon-plus"></div>
                            </a>
                            <!--<a href="#"><img src="../images/done.png" /></a>-->
                        </div>
                        <div class="col-lg-2">
                            <label class="label-success label">Naftero</label><br />
                            <div class="radio-inline">
                                <input type="radio" name="naftero" id="naftero" value="Si" checked /> Si
                            </div>
                            <div class="radio-inline">
                                <input type="radio" name="naftero" id="naftero" value="No" /> No
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <label class="label-success label">Valor Asegurado</label>    
                            <input type="text" name="valor" id="valor" class="form-control" onkeypress="return soloNumeros(event);" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <!--<img src="verimagen.php" width="150px" />-->
                        </div>
                        <div class="col-lg-4">
                            <label class="label label-primary">Cargar Foto 1:</label>
                            <input type="file" id="archivo1" /><br>
                        </div>
                        <div class="col-lg-2">
                            <!--<img src="verimagen.php" width="150px" />-->
                        </div>
                        <div class="col-lg-4">
                            <label class="label label-primary">Cargar Foto 2:</label>
                            <input type="file" id="archivo2" /><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <!--<img src="verimagen.php" width="150px" />-->
                        </div>
                        <div class="col-lg-4">
                            <label class="label label-primary">Cargar Foto 3:</label>
                            <input type="file"  id="archivo3" /><br>
                        </div>
                        <div class="col-lg-2">
                            <!--<img src="verimagen.php" width="150px" />-->
                        </div>
                        <div class="col-lg-4">
                            <label class="label label-primary">Cargar Foto 4:</label>
                            <input type="file"  id="archivo4" /><br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            <label class="label-success label">GNC</label><br />
                            <div class="radio-inline">
                                <input type="radio" name="gnc" id="gnc" value="Si" onclick="gas();" /> Si
                            </div>
                            <div class="radio-inline">
                                <input type="radio" name="gnc" id="gnc" value="No" onclick="gas();" checked /> No
                            </div>
                        </div>
                    </div>
                    <div id="gas" style="display: none">
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="label-success label">Regulador</label>    
                                <input type="text" name="regulador" id="regulador" class="form-control"/>
                            </div>
                            <div class="col-lg-4">
                                <label class="label-success label">Marca Regulador</label>    
                                <input type="text" name="marcaReg" id="marcaReg" class="form-control"/>
                            </div>
                            <div class="col-lg-4">
<!--                                <label class="label-success label">Cantidad de Cilindro</label>    
                                <input type="number" name="cantidadC" id="cantidadC" class="form-control" onkeypress="return soloNumeros(event);"/>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="label-success label">Marca de Cilindro</label>    
                                <input type="text" name="marcaC1" id="marcaC1" class="form-control"/>
                            </div>
                            <div class="col-lg-2">
                                <label class="label-success label">Nº Cilindro</label>    
                                <input type="text" name="numeroC1" id="numeroC1" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="label-success label">Marca de Cilindro 2</label>    
                                <input type="text" name="marcaC2" id="marcaC2" class="form-control"/>
                            </div>
                            <div class="col-lg-2">
                                <label class="label-success label">Nº Cilindro 2</label>    
                                <input type="text" name="numeroC2" id="numeroC2" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4">
                                <label class="label-success label">Marca de Cilindro 3</label>    
                                <input type="text" name="marcaC3" id="marcaC3" class="form-control"/>
                            </div>
                            <div class="col-lg-2">
                                <label class="label-success label">Nº Cilindro 3</label>    
                                <input type="text" name="numeroC3" id="numeroC3" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <input type="button" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="guardarVehiculo();" />
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary oculto" onclick="location.reload();" />
                    </div>
                    <div class="col-sm-8" id="divResultado"></div>
                </div>
            </form>
            <legend>Listado</legend>
            <div id="listado" class="table-responsive">
                <?php include 'listadoVehiculos.php'; ?>
            </div>
            <div id="div_oculto"></div>
        </div>
        <?php include_once '../includes/php/footer.php'; ?>
        <script src="../bootstrap/js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>   
    </body>
</html>