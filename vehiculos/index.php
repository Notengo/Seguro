<?php
// Se requieren los script para acceder a los datos de la DB
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

if (isset($_GET['usu'])) {
    $oMysqlCliente = $oMysql->getClientesActiveRecord();
    $oCliente = new ClientesValueObject();
    $oCliente->set_idclientes($_GET['usu']);
    $oCliente = $oMysqlCliente->buscar($oCliente);
    $cli = $oCliente->get_idclientes();
}
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
        <script src="js/modal.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form name="vehiculo" class="form-horizontal" action="guardarVehiculo.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <input name="accion" value="Guardar" id="accion" type="hidden"/>
                <div>
                    <legend>Vehiculos</legend>
                    <!--<div id="nuevo" style="display: <?php // echo (isset($_GET['usu'])) ? 'initial' : 'none';    ?>;">-->
                    <div id="nuevo" style="display: none;">
                        <div class="row">
                            <div class="col-sm-1">
                                <label class="label-success label">Id</label>
                                <input type="text" class="form-control"  name="cliente_ID" id="cliente_hidden" value="<?php echo (isset($oCliente)) ? $oCliente->get_idclientes() : ''; ?>" />
                            </div>
                            <div class="col-sm-8">
                                <label class="label-success label">Cliente</label>    
                                <input type="text" name="cliente" id="cliente" class="form-control" data-toggle="tooltip" 
                                       placeholder="Cliente Asegurado" title="Cliente Asegurado" alt="Cliente Asegurado"
                                       onkeyup="ajax_showOptionsCliente(this, 'getClienteByLetters', event);"
                                       value="<?php echo (isset($oCliente)) ? $oCliente->get_apellido() . ', ' . $oCliente->get_nombre() : ''; ?>" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="label-success label">Marca</label> 
                                <input type="text" name="marca" id="marca" class="form-control" data-toggle="tooltip" title="Marca del Vehiculo" alt="Marca del Vehiculo" placeholder="seleccione"año
                                       onkeyup="ajax_showOptionsMarca(this, 'getMarcaByLetters', event);" />
                                <input type="hidden" name="marca_ID" id="marca_hidden"value="" />
                            </div>
                            <div class="col-lg-1">
                                <br>
                                <a href="#" data-toggle="modal" data-target="#myModal" onclick="altaModal(1)">
                                    <div class="glyphicon glyphicon-plus"></div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <label class="label-success label">Modelo</label>    
                                <input type="text" name="modelo" id="modelo" class="form-control" data-toggle="tooltip" title="Modelo Vehiculo" alt="Modelo Vehiculo" />
                                       <!--onkeyup="ajax_showOptionsModelo(this, 'getModeloByLetters', event);" />-->
                                <input type="hidden" name="modelo_ID" id="modelo_hidden"value="" />
                            </div>
                            <div class="col-lg-1">
<!--                                <br>
                                <a href="#" data-toggle="modal" data-target="#myModal" onclick="altaModal(2)">
                                    <div class="glyphicon glyphicon-plus"></div>
                                </a>-->
                            </div>
                            <div class="col-lg-4">
                                <label class="label-success label">Version</label>    
                                <input type="text" name="version" id="version" class="form-control" data-toggle="tooltip" title="version del Vehiculo" alt="Version del Vehiculo"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="label-success label">Nº Motor</label>    
                                <input type="text" name="motor" id="motor" class="form-control"/>
                            </div>
                            <div class="col-lg-4">
                                <label class="label-success label">Nº Chasis</label>    
                                <input type="text" name="chasis" id="chasis" class="form-control"/>
                            </div> 
                        </div>
			<br>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="label-success label">Patente</label>    
                                <input type="text" name="patente" id="patente" class="form-control" onblur="buscarPatente()"/>
                                <input type="hidden" name="idV" id="idV"/>
                            </div>
                            <div class="col-lg-2">
                                <label class="label-success label">Año de Fabricaci&oacute;n</label>    
                                <input type="text" name="fabricacion" id="fabricacion" class="form-control"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="label-success label">Tipo</label>
                                <input type="text" name="tipo" id="tipo" class="form-control" placeholder="seleccione"
                                       onkeyup="ajax_showOptionsTipo(this, 'getTipoByLetters', event);" />
                                <input type="hidden" name="tipo_ID" id="tipo_hidden"value="" />
                            </div>
                            <div class="col-lg-1">
                                <br>
                                <a href="#" data-toggle="modal" data-target="#myModal" onclick="altaModal(3)">
                                    <div class="glyphicon glyphicon-plus"></div>
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <label class="label-success label">Uso</label>
                                <input type="text" name="uso" id="uso" class="form-control" placeholder="seleccione"
                                       onkeyup="ajax_showOptionsUso(this, 'getUsoByLetters', event);" />
                                <input type="hidden" name="uso_ID" id="uso_hidden"value="" />
                            </div>
                            <div class="col-lg-1">
                                <br>
                                <a href="#" data-toggle="modal" data-target="#myModal" onclick="altaModal(4)">
                                    <div class="glyphicon glyphicon-plus"></div>
                                </a>
                            </div>
                            <div class="col-lg-2">
                                <label class="label-success label">Naftero</label><br />
                                <div class="radio-inline">
                                    <input type="radio" name="naftero" id="nafteroSi" value="Si" checked /> Si
                                </div>
                                <div class="radio-inline">
                                    <input type="radio" name="naftero" id="nafteroNo" value="No" /> No
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
                                <a href="" target="_blank" id="vehiculo1">
                                    <img src="" id="img1" width="150" style="display: none;"/>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <label class="label label-primary">Cargar Foto 1:</label>
                                <input type="file" id="archivo1" name="archivo1" /><br>
                            </div>
                            <div class="col-lg-2 img-responsive" id="imagen2">
                                <a href="" target="_blank" id="vehiculo2">
                                    <img src="" id="img2" width="150" style="display: none;"/>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <label class="label label-primary">Cargar Foto 2:</label>
                                <input type="file" id="archivo2" name="archivo2" /><br>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-2">
                                <a href="" target="_blank" id="vehiculo3">
                                    <img src="" id="img3" width="150" style="display: none;"/>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <label class="label label-primary">Cargar Foto 3:</label>
                                <input type="file"  id="archivo3" name="archivo3"/><br>
                            </div>
                            <div class="col-lg-2">
                                <a href="" target="_blank" id="vehiculo4">
                                    <img src="" id="img4" width="150" style="display: none;"/>
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <label class="label label-primary">Cargar Foto 4:</label>
                                <input type="file"  id="archivo4" name="archivo4"/><br>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="label-success label">GNC</label><br />
                                <div class="radio-inline">
                                    <input type="radio" name="gnc" id="gncSi" value="Si" onclick="gas();" /> Si
                                </div>
                                <div class="radio-inline">
                                    <input type="radio" name="gnc" id="gncNo" value="No" onclick="gas();" checked /> No
                                </div>
                            </div>
                            <div class="col-lg-10">
                            </div>
                        </div>

                        <div id="gas" style="display: none">
                            <br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="label-success label">Marca Regulador</label>    
                                    <input type="text" name="marcaReg" id="marcaReg" class="form-control"/>
                                </div>
                                <div class="col-lg-4">
                                    <label class="label-success label">Regulador</label>    
                                    <input type="text" name="regulador" id="regulador" class="form-control"/>
                                </div>
                                <div class="col-lg-4">
                                    <!--                                <label class="label-success label">Cantidad de Cilindro</label>    
                                                                    <input type="number" name="cantidadC" id="cantidadC" class="form-control" onkeypress="return soloNumeros(event);"/>-->
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="label-success label">Marca de Cilindro</label>    
                                    <input type="text" name="marcaC1" id="marcaC1" class="form-control"/>
                                </div>
                                <div class="col-lg-2">
                                    <label class="label-success label">Nº Cilindro</label>    
                                    <input type="text" name="numeroC1" id="numeroC1" class="form-control"/>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="label-success label">Marca de Cilindro 2</label>    
                                    <input type="text" name="marcaC2" id="marcaC2" class="form-control"/>
                                </div>
                                <div class="col-lg-2">
                                    <label class="label-success label">Nº Cilindro 2</label>    
                                    <input type="text" name="numeroC2" id="numeroC2" class="form-control"/>
                                </div>
                            </div>
                            <br>
                            <div class="row">
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
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            <!--<input type="button" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="guardarVehiculos();" />-->
                            <!--<input type="submit" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="return guardarVehiculos(), buscarPatente();"/>-->
                            <input type="submit" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="return guardarVehiculos();"/>
                        </div>
                        <div class="col-sm-2">
                            <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary oculto" onclick="location.reload();" />
                        </div>
                        <div class="col-sm-8" id="divResultado"></div>
                    </div>
                    <!--</form>-->
                    <br>
                    <legend>Listado</legend>
                    <div id="listado" class="table-responsive">
                        <?php include 'listadoVehiculos.php'; ?>
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="volver" value="Volver" class="btn btn-large btn-block btn-primary " onclick="window.location.href = '../clientes/'" />
                    </div>
                    <div id="div_oculto"></div>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Marca</h4>
                                </div>
                                <div class="modal-body" id="cuerpoModal">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="botonModal" class="btn btn-primary" onclick="guardarModal()">Guardar</button>
                                    <!--<button type="submit" id="botonModal" class="btn btn-primary">Guardar</button>-->
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id="valorModal" type="text" value="" />
                </div>
            </form>
        </div>
        <?php include_once '../includes/php/footer.php'; ?>
        <script src="../bootstrap/js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>