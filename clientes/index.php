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
        <title>Seguro - Contactos</title>
        <script src="js/ajax-dynamic-list.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body onload="document.getElementById('apellido').focus();">
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <form class="form-horizontal" name="formulario" >
                <legend>Contactos</legend>
                <div class="form-group">
                    <div class="col-lg-4">
                        <label class="label-success label">Apellido</label>
                        <input class="form-control" data-toggle="tooltip" name="apellido" id="apellido" title="Apellido de contacto" alt="Apellido de contacto" placeholder="Apellido de contacto" type="text" />
                    </div>
                    <div class="col-lg-5">
                        <label class="label-success label">Nombre</label>
                        <input class="form-control" data-toggle="tooltip" name="nombre" id="nombre" title="Nombre de contacto" alt="Nombre de contacto" placeholder="Nombre de contacto" type="text" />
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">Fecha Nacimiento</label>
                        <input class="form-control" data-toggle="tooltip" name="nacimiento" id="nacimiento" title="Fecha de nacimiento" alt="Fecha de nacimiento" type="date" value=""  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <?php
                        /* Falta la clase de tipo de documentos. */
                        ?>
                        <label class="label-success label">Tipo documento</label>
                        <select class="form-control" name="tipodoc" id="tipodoc" >
                            <option value="1">CI</option>
                            <option value="2" selected>DNI</option>
                            <option value="3">LC</option>
                            <option value="4">PASAPORTE</option>
                            <option value="5">RI</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">N&ordm; documento</label>
                        <input class="form-control" data-toggle="tooltip" name="documento" id="documento" title="Número documento" alt="Número documento" placeholder="12345678" type="number" />
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">CUIT/CUIL (sin -)</label>
                        <input class="form-control" data-toggle="tooltip" name="cuit" id="cuit" title="Número documento" alt="Número documento" placeholder="12345678" type="number" />
                    </div>
                    <div class="col-lg-4">
                        <?php
                        $oMysqlCondFiscal = $oMysql->getCondfiscalesActiveRecord();
                        $oCondFiscal = new CondfiscalesValueObject();
                        $oCondFiscal = $oMysqlCondFiscal->buscarTodo();
                        ?>
                        <label class="label-success label">Condici&oacute;n Fiscal</label>
                        <select class="form-control" name="condicionfiscal" id="condicionfiscal" >
                            <?php
                            foreach ($oCondFiscal as $aCondFiscal) {
                            ?>
                            <option value="<?php echo $aCondFiscal->get_idcondfiscales(); ?>"><?php echo $aCondFiscal->get_descripcion();?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <label class="label-success label">CP</label>
                        <input class="form-control" data-toggle="tooltip" name="cp" id="cp" title="C&oacute;digo Postal" alt="C&oacute;digo Postal" type="text" value="3100" />
                    </div>
                    <div class="col-lg-5">
                        <label class="label-success label">Localidad</label>
                        <input class="form-control" data-toggle="tooltip" name="localidad" id="localidad"
                               title="Localidad" alt="Localidad" type="text" value="" 
                               onkeyup="ajax_showOptionsUbicacion(this,'getLocalidadByLetters',event);" />
                        <input name="localidad_ID" id="localidad_hidden" type="hidden" value="" />
                    </div>
                    <div class="col-lg-5">
                        <label class="label-success label">Barrio</label>
                        <input class="form-control" data-toggle="tooltip" name="barrio" id="barrio" 
                               title="Barrio" alt="Barrio" type="text" value="" 
                               onkeyup="ajax_showOptionsBarrio(this,'getBarrioByLetters',event);" />
                        <input name="barrio_ID" id="barrio_hidden" type="hidden" value="" />
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-6">
                        <label class="label-success label">Calle</label>
                        <input class="form-control" data-toggle="tooltip" name="calle" id="calle" title="Nombre de la calle" alt="Nombre de la calle" type="text" value="" />
                        <input name="calle_ID" id="calle_hidden" type="hidden" value="" />
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">N&ordm;</label>
                        <input class="form-control" data-toggle="tooltip" name="numero" id="numero" title="Orden de oficina" alt="Orden de oficina" type="number" value="" onkeypress="return soloNumeros(event);" />
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">Piso</label>
                        <input class="form-control" data-toggle="tooltip" name="piso" id="piso" title="Piso" alt="Piso" type="number" value="" onkeypress="return soloNumeros(event);" />
                    </div>
                    <div class="col-lg-2">
                        <label class="label-success label">Dpto</label>
                        <input class="form-control" data-toggle="tooltip" name="dpto" id="dpto" title="Departamento" alt="Departamento" type="text" value="" />
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-3">
                        <label class="label-success label">N&ordm; Tel&eacute;fono</label>
                        <input class="form-control" data-toggle="tooltip" name="telefono" id="telefono" title="Orden de oficina" alt="Orden de oficina" type="number"value="" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-3">
                        <label class="label-success label">N&ordm; Celular</label>
                        <input class="form-control" data-toggle="tooltip" name="celular" id="celular" title="Orden de oficina" alt="Orden de oficina" type="number"value="" onkeypress="return soloNumeros(event);" /><br/>
                    </div>
                    <div class="col-lg-6">
                        <label class="label-success label">Correo Electronico</label>
                        <input class="form-control" data-toggle="tooltip" name="correo" id="correo" title="Orden de oficina" alt="Orden de oficina" type="email" min="1" max="<?= $orden; ?>" value=""  /><br/>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-2">
                        <input type="button" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" onclick="guardarCliente()" />
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="eliminar" value="Eliminar" class="btn btn-large btn-block btn-danger oculto" onclick="location.reload();" />
                    </div>
                    <div class="col-sm-8" id="divResultado"></div>
            </form>
            <legend>Listado</legend>
            <div class="table-responsive" id="listadoCliente">
                <?php include 'buscarTodos.php'; ?>
            </div>
        </div>
        <div id="div_listar"></div>
        <div id="div_oculto" ></div>
    </body>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>   
</html>