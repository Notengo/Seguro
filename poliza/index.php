<?php
// Se requieren los script para acceder a los datos de la DB
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

extract($_GET, EXTR_OVERWRITE);
$no = 'si';
if (isset($vehiculo)) {
    $oMysqlVehiculo = $oMysql->getVehiculoActiveRecord();
    $oVehiculo = new VehiculosValueObject();
    $oVehiculo->set_idvehiculos($vehiculo);
    $oVehiculo = $oMysqlVehiculo->buscar($oVehiculo);

    $usu = $oVehiculo->get_idclientes();
}

if (isset($usu)) {
    $oMysqlCliente = $oMysql->getClientesActiveRecord();
    $oCliente = new ClientesValueObject();
    $oCliente->set_idclientes($usu);
    $oCliente = $oMysqlCliente->buscar($oCliente);
}
if (isset($vehiculo)) {
    $oMyPoliza = $oMysql->getPolizaActiveRecord();
    $oPoliza = new PolizasValueObject();
    $oPoliza->set_idclientes($usu);
    $oPoliza->set_patente($oVehiculo->get_patente());
    $oPoliza->set_idvehiculos($vehiculo);

    if (!$oMyPoliza->existe($oPoliza)) {
        $no = 'no';
    } else {
        $no = 'si';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Poliza</title>
        <script src="js/ajax-dynamic-list.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script src="js/modal.js" type="text/javascript"></script>

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <!--<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">-->
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="document.getElementById('poliza').focus();">
        <?php include '../includes/php/header.php'; ?>
        <div class="container">
            <div>
                <legend>Poliza</legend>
                <div id="nuevo" class="<?php echo ($no == 'si') ? 'oculto' : '' ?>">
                    <div class="row">
                        <div class="col-lg-3">
                            <label class="label label-success">Nº de Poliza</label>
                            <input type="text" name="poliza" id="poliza" class="form-control"/>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <label class="label label-success">Compañ&iacute;a</label>
                            <div id="divcompania">
                                <?php include_once 'selectCompania.php'; ?>
                            </div>
                        </div>
                        <!--                        <div class="col-lg-1">
                                                    <br>
                                                    <a href="#" data-toggle="modal" data-target="#myModal" onclick="altaModal(1)">
                                                        <div class="glyphicon glyphicon-plus"></div>
                                                    </a>
                                                </div>-->
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="label label-success">Cliente</label>
                            <input type="text" name="cliente" id="cliente" class="form-control" data-toggle="tooltip" 
                                   placeholder="Cliente Asegurado" title="Cliente Asegurado" alt="Cliente Asegurado"
                                   onkeyup="ajax_showOptionsCliente(this, 'getClienteByLetters', event);"
                                   value="<?php echo (isset($oCliente)) ? $oCliente->get_apellido() . ', ' . $oCliente->get_nombre() : ''; ?>" />
                            <input type="hidden" name="cliente_ID" id="cliente_hidden" value="<?php echo (isset($oCliente)) ? $oCliente->get_idclientes() : ''; ?>" />
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-2">
                            <label class="label label-success">Patente</label>
                            <input type="text" name="patente" id="patente" class="form-control" data-toggle="tooltip" 
                                   title="Matricula Veh&iacute;culo Asegurado" alt="Matricula Veh&iacute;culo"
                                   onkeyup="ajax_showOptionsPatente(this, 'getPatenteByLetters', event);"
                                   value="<?php echo (isset($oVehiculo)) ? $oVehiculo->get_patente() : ''; ?>" />
                            <input type="hidden" name="patente_ID" id="patente_hidden" value="<?php echo (isset($vehiculo)) ? $vehiculo : ''; ?>" />
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-2">
                            <label class="label label-success">Cobertura</label>
                            <div id="divcobertura">
                                <?php include_once 'selectCobertura.php'; ?>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <a href="#" data-toggle="modal" data-target="#myModal" onclick="altaModal(4)">
                                <div class="glyphicon glyphicon-plus"></div>
                            </a>
                        </div>

                        <div class="col-lg-1"></div>

                        <div class="col-lg-4">
                            <label class="label label-success">Otros Riesgos</label>
                            <div id="divotroriesgo">
                                <?php include_once './selectOtroRiesgo.php'; ?>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <br>
                            <a href="#" data-toggle="modal" data-target="#myModal" onclick="altaModal(3)">
                                <div class="glyphicon glyphicon-plus"></div>
                            </a>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <!--<legend>-->
                        <h5>Vigencia</h5>
                        <!--</legend>-->
                        <div class="col-lg-2">
                            <label class="label label-success">desde</label>
                            <input type="text" name="desde" id="desde" class="form-control" value="<?php echo date('d/m/Y'); ?>" onblur="validarFecha(this)" onKeypress="return fechaControl(this.id, event);" maxlength="10" />
                        </div>
                        <div class="col-lg-2">
                            <?php
                            $mes = date('m');
                            $anio = date('Y');
                            $mes = $mes + 6;
                            if ($mes > 12) {
                                $mes = $mes - 12;
                                $anio++;
                            }
                            ?>
                            <label class="label label-success">hasta</label>
                            <input type="text" name="hasta" id="hasta" class="form-control" value="<?php
                            echo date('d') . '/';
                            if ($mes < 10) {
                                echo '0' . $mes;
                            }
                            echo '/' . $anio;
                            ?>" onblur="validarFecha(this)" onKeypress="return fechaControl(this.id, event);" maxlength="10" />
                        </div>

                        <div class="col-lg-1">
                            <label class="label label-success">2&ordm; Vencimiento</label>
                            <input type="text" name="vencimiento2" id="vencimiento2" class="form-control" onkeypress="return soloNumeros(event);" value="<?php echo date('d'); ?>" />
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
                            <input type="number" name="cuota" id="cuota" class="form-control" onkeypress="return soloNumeros(event);" value="<?php echo '6'; //(date('m') >= 6) ? 12 - date('m') : 6 - date('m');         ?>"/>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-3">
                            <label class="label label-success">Forma de Pago</label>
                            <div id="divformaspago">
                                <?php include_once 'selectFormasPago.php'; ?>
                            </div>
                        </div>

                        <div class="col-lg-1">
                            <br>
                            <a href="#" data-toggle="modal" data-target="#myModal" onclick="altaModal(5)">
                                <div class="glyphicon glyphicon-plus"></div>
                            </a>
                        </div>

                        <div class="col-lg-4">
                            <label class="label label-success">Nº CBU o TC</label>
                            <input type="text" name="cbu" id="cbu" class="form-control"/>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="label label-success">Observaci&oacute;n</label>
                            <textarea rows="4" maxlength="1000" name="observacion" id="observacion" class="form-control" > </textarea>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <?php
                    if ($no == 'si') {
                        ?>
                        <div class="col-sm-2">
                            <input type="button" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="guardarDatos();" />
                        </div>
                        <div class="col-sm-2">
                            <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary oculto" onclick="location.reload();" />
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="col-sm-2">
                            <!--<input type="button" id="guardar" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="guardarDatos();" />-->
                            <input type="button" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" onclick="guardarDatos();" />
                        </div>
                        <div class="col-sm-2">
                            <!--<input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary oculto" onclick="location.reload();" />-->
                            <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary" onclick="location.reload();" />
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-sm-8" id="divResultado"></div>
                </div>
            </div>
            <br>
            <div class="row">
                <legend>Listado &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
            </div>
            <div class="row">
                <div class="col-sm-1 col-lg-1">Buscador</div>
                <div class="col-sm-5 col-lg-5">
                    <input type="text" class="form-control" id="filtro" name="filtro" onkeypress="return enter(event)"/>
                </div>
                <div class="col-sm-2 col-lg-2">
                    <a type="button" class="btn btn-default" onclick="filtrar()">
                        <img src="../images/Original Size/search.png" width="20px" />
                    </a>
                </div>
            </div>
            <br>
            <div class="table-responsive" id="listadoPoliza">
                <?php include_once 'listadoPoliza.php'; ?>
            </div>
        </div>
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <input id="guardarModal" type="hidden" value="" />
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</html>
