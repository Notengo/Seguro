<?php
$vehiculos = $_GET['idv'];
$cliente = $_GET['idc'];
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Accesorios</title>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <div data-toggle="modal" data-target="#miventana">
                <button class="btn btn-primary">Nuevo</button>
            </div>
            <br>
            <?php
            $filtro = $_GET['idv'];
            require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
            $oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
            $oMysql->conectar();

            $oMysqlAccesorio = $oMysql->getAccesoriosActiveRecord();
            $oAccesorio = new AccesoriosValueObject();

            if (!isset($filtro)) {
                $oAccesorio = $oMysqlAccesorio->buscarTodo();
            } else {
                $oAccesorio->set_idVehiculos($filtro);
                $oAccesorio = $oMysqlAccesorio->buscar($oAccesorio);
            }

            if ($oAccesorio) {
                ?>
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <tr class="success">
                        <th>ID Vehiculo</th>
                        <th>Accesorio</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>
    <?php
    $tipodelete = "delete";
    foreach ($oAccesorio as $aAccesorio) {
        ?>
                        <tr>
                            <td><?php echo $aAccesorio->get_idVehiculos(); ?></td>
                            <td><?php echo $aAccesorio->get_nombreA();
                $nombre = $aAccesorio->get_nombreA(); ?></td>
                            <td><?php echo $aAccesorio->get_valor();
                $valor = $aAccesorio->get_valor(); ?></td>
                            <td>
                                <a href="modificarAccesorios.php?idv=<?php echo $aAccesorio->get_idVehiculos(); ?>&ida=<?php echo $aAccesorio->get_idAccesorios(); ?>&idc=<?php echo $cliente ?>&nom=<?php echo $nombre ?>&val=<?php echo $valor ?>" class="glyphicon glyphicon-edit" title="Editar" ></a>
                                <a href="accionesAccesorios.php?idv=<?php echo $aAccesorio->get_idVehiculos(); ?>&ida=<?php echo $aAccesorio->get_idAccesorios(); ?>&tipo=delete&idc=<?php echo $cliente ?>" class="glyphicon glyphicon-remove text-danger" title="Eliminar"></a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-info">Este vehiculo no tiene Accesorios asignados</div>
                    <?php
                }
                ?>
            </table>

            <div class="col-lg-5"></div>
            <div class="col-lg-2">
                <input type="button" class="form-control btn btn-primary" value="volver" onclick="window.location.href = 'index.php?usu=<?php echo $cliente; ?>'"
            </div>       
        </div>       
        <!-- este es el Modal para dar de alta los accesorios de cada vehiculo, que es llamado desde lisdadoVehiculos-->
        <div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>Nuevo Accesorio</h4>
                    </div>
                    <div class="modal-body">
                        <form action="guardarAccesorios.php" method="post">    

                            <div class="row">

                                <div class="col-lg-2">
                                    <label class="label label-success">Id Vehiculo</label>
                                    <input class="form-control" type="text" name="id" disabled="" value="<?php echo $vehiculos; ?>" />  
                                </div>
                                <div class=" col-lg-10"></div>

                                <div class="col-lg-8">
                                    <input type="hidden" name="idUsu" value="<?php echo $cliente; ?>"/>
                                    <input type="hidden" name="idVehiculo" value="<?php echo $vehiculos; ?>"/>
                                    <label class="label label-success">Nombre</label>
                                    <input class="form-control" type="text" name="nombreA" placeholder="nombre.."/>  
                                </div>
                                <br>
                                <br>
                                <div class=" col-lg-2"></div>
                                <div class="col-lg-8">
                                    <label class="label-success label">Valor</label>
                                    <input class="form-control" type="text" name="valorA" placeholder="valor.."/>     
                                </div>                       
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Guardar" name="altaAccesorio"/>
                            </div>
                        </form> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">cerrar</button>
                    </div>

                </div>
            </div> 
        </div>


        <!-- este es el Modal para dar de alta los accesorios de cada vehiculo, que es llamado desde lisdadoVehiculos-->


        <script src="../bootstrap/js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <br>
        <br>
        <br>
        <br>
        <?php include_once '../includes/php/footer.php'; ?>
    </body>
</html>