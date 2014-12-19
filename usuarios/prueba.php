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
        <script src="js/funcion.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
    </head>
    <body>
<legend>Cargar Productos</legend>
<form action="guardarUsuario.php" method="post">
                                    <div style="text-align: left">
                                        <?php $tabindex = 0; ?>
                                        <?php $tabindex++; ?>
                                        <label for="producto">Producto:</label>
                                        
                                        <select name="producto" id="producto" style="width: 300px;">
                                            <option value='0'>Seleccione un Producto</option>
                                            <?php
                                            foreach ($oCompania as $valorP) {
                                                echo "<option value='" . $valorP->get_idcompanias() . "'>" . utf8_encode($valorP->get_razonsocial()) . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <?php $tabindex++; ?>
                                        <label for="cantidad" class="detalle detalle2">Cantidad:</label>
                                        <input name="cantidad" id="cantidad" type="number" maxlength="2" value="1" style="width: 40px;" />
                                        <input name="listaProducto" id="listaProducto" type="hidden" />

                                        <?php $tabindex++; ?>
                                        <label for="monto" class="detalle detalle2"></label>
                                        <input id="monto" name="monto" size="5" type="hidden" />

                                        <img src="../images/cars.png" onclick="productoAgregar();" alt="Agregar Producto" title="Agregar Producto" />
                                        <br/>&nbsp;
                                        <div id="productosDiv"></div>
                                    </div>  
                            </fieldset> 
                           <div class="row">
                <div class="col-sm-2">
                    <input type="submit" id="guardar" value="Guardar" class="btn btn-large btn-block btn-primary" />
                </div>
                <div class="col-sm-2">
                    <input type="button" id="cancelar" value="Cancelar" class="btn btn-large btn-block btn-primary" onclick="location.reload();" style="display: none"/>
                </div>
              
            </div> 
           </form>                 
        </body>                    
</html>                            