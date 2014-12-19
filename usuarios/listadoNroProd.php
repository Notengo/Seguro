<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlUsuarioCompania = $oMysql->getUsuarioCompaniaActiveRecord();
$oUsuarioCom = new UsuarioCompaniaValueObject();

$_idUsuario = $_GET['idU'];

$oUsuarioCom->set_idUsuario($_idUsuario);
$oUsuarioCom = $oMysqlUsuarioCompania->buscar($oUsuarioCom);
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
 <?php include_once '../includes/php/header.php';?>   
<div  class='container'>
            <table class="table table-condensed table-hover">
                <tr class="sucess"><th>IDUsuario</th><th>Compa&ntilde;ia</th><th>N&ordm;Productor</th><th></th></tr>
<?php
foreach ($oUsuarioCom as $aUsuarioCom)
{
    $id=$aUsuarioCom->get_idCompania();
    $idu=$aUsuarioCom->get_idUsuario();
    $sql="select razonsocial from companias where idcompanias=$id";
    $val = mysql_query($sql);
    $compania = mysql_fetch_object($val);
 ?>
<tr>
    <td><?php echo $aUsuarioCom->get_idUsuario()?></td>
    <td><?php echo $compania->razonsocial?></td>
    <td><?php echo $aUsuarioCom->get_nroProductor()?></td>

         <td>
             <a class="glyphicon glyphicon-edit" href="modificarNroProductor.php?idu=<?php echo $idu?>&idc=<?php echo $id?>&razons=<?php echo$compania->razonsocial?>&nrop=<?php echo$aUsuarioCom->get_nroProductor()?>" title="Modificar"></a>&nbsp;&nbsp;
             <a class="glyphicon glyphicon-remove text-danger" href="accionesNroProductor.php?tipo=eliminar&idu=<?php echo $idu?>&idc=<?php echo$id?>" title="Emilinar"></a>
         </td>
 </tr>          
 <?php
}
?></table>
    <br>
    <div class="row">
        <div>
            Agregar Compa&ntilde;ia <input type='image' src="../images/masm.png" onclick="ocultar()">   
        </div>
        <div id="ocultar" style="display: none">
            <form action="accionesNroProductor.php" method="get">
            <?php
            $oMysqlCompania = $oMysql->getCompaniaActiveRecord();
            $oCompania = new CompaniasValueObject();
            $oCompania = $oMysqlCompania->buscarTodo();
            ?>
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
                            <div class="row">
                                <input type="hidden" name="idusuario" value="<?php echo$_idUsuario?>">
                                <input type="hidden" name="tipo" value="agregar">
                                <div class="col-lg-2">
                                    <input type="submit" class="btn btn-primary form-control" name='agregar' value="Agregar">
                                </div>
                            </div>
                        </div> 

                    </div>
                </div>
            </form> 
        </div>
        
    </div>
    <br><br>
    <div class="row">
    <div class="col-lg-2">
    <input type="button" class="form-control btn btn-primary" value="Volver" onclick="window.location.href='index.php'"
    </div>       
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
   </div>
   </div> 
</body>
</html>