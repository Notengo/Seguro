<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlCompania = $oMysql->getCompaniaActiveRecord();
$oCompania = new CompaniasValueObject();
$oCompania = $oMysqlCompania->buscarTodo();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Productores</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script src="js/funcion.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
     <div class="container">
         <form action="guardarUsuario.php" method="post">  
            <legend>Nuevo Productor</legend>
            <div id="ocultar" style="display: none">
                  
                <div class="row">
                    <div class="col-sm-4 col-lg-5">
                        <!--<label class="label-success label">Usuario</label>-->
                        <input class="form-control" data-toggle="tooltip" name="usuario" id="usuario" title="Usuario" alt="usuario" placeholder="Usuario.." type="hidden" value="pr0duc10r3s"/>
                    </div>
                    <div class="col-sm-5 col-lg-5">
                        <!--<label class="label-success label">Password</label>-->
                        <input class="form-control" data-toggle="tooltip" name="password" id="password" title="Password" alt="Password" placeholder="Password.." type="hidden" value="pr0duc10r3s"/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-5 col-lg-5">
                        <label class="label-success label">Nombre</label>
                        <input class="form-control" data-toggle="tooltip" name="nombre" id="nombre" title="nombre" alt="nombre" placeholder="Nombre.." type="text" />
                    </div> 
                    <div class="col-sm-5 col-lg-5">
                        <label class="label-success label">Apellido</label>
                        <input class="form-control" data-toggle="tooltip" name="apellido" id="apellido" title="apellido" alt="apellido" placeholder="apellido.." type="text" />
                    </div> 
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-10 col-lg-10">
                        <?php $tabindex = 0; ?>
                        <?php $tabindex++; ?>
                        <label class="label label-success">Compania:</label>
                        <?php
                        /* Aca va los datos de los productos. */
                        //$oProducto = new Producto;
                        //$producto = $oProducto->verProducto();
                        ?>
                        <br>
                        <div class="row">
                            <div class="col-lg-5">
                                <select name="compania" id="compania" class="form-control">
                                    <option value='0'>Seleccione una Compa&ntilde;ia..</option>
                                    <?php
                                    foreach ($oCompania as $valorP) {
                                        echo "<option value='" . $valorP->get_idcompanias() . "'>" . utf8_encode($valorP->get_razonsocial()) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php $tabindex++; ?>
                            <div class="row">    
                                <label for="numero" class="label label-success detalle detalle2">N&ordm;:</label>
                                <input name="numero" id="numero" type="text" maxlength="8" value="1" style="width: 60px;" />
                                
                                <input name="listaCompanias" id="listaCompanias" type="hidden" />
                                <?php $tabindex++; ?>
                                <label for="monto" class="detalle detalle2"></label>
                                <input id="monto" name="monto" size="5" type="hidden" />
                                <a class="glyphicon glyphicon-plus text-success" onclick="companiaAgregar()" title="Agregar Numero"></a>
                                <!--<img src="../images/ok.png" onclick="companiaAgregar();" alt="Agregar Compania" title="Agregar Compania" />-->
                                <br/>&nbsp;
                            </div>
                            <div class="col-lg-5">
                                
                                <div id="companiasDiv"></div>
                            </div>
                        </div> 

                    </div>
                </div>
                <div class="row">
                <div class="col-sm-2">
                    <input type="submit" name="guardar" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" />
                </div>
                <div class="col-sm-2">
                    <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary" onclick="location.reload();" style="display: none"/>
                </div>
              
            </div>
            </div>
            <br>
            <br>
            <br>
         <div class="row">
                <div class="col-sm-2">
                    <input type="button" id="oculta" value="Nuevo" class="btn btn-large btn-block btn-primary" onclick="ocultar()" />
                </div>
                <div class="col-sm-2">
                    <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary" onclick="location.reload();" style="display: none"/>
                </div>
              
            </div>
        </form> 
        <?php
         include_once './listadoUsuarios.php';
        
        ?>
         
</div>
    <br>
    <?php include_once '../includes/php/footer.php'; ?>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
