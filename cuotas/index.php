<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

extract($_GET, EXTR_OVERWRITE);

$oMyCuotas = $oMysql->getCuotaActiveRecord();
$oCuota = new CuotasValueObject();
$oCuota->set_nropoliza($nropoliza);
$oCuota = $oMyCuotas->buscarPoliza($oCuota);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguro - Poliza - Cuotas</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script src="js/modal.js" type="text/javascript"></script>

        <script src="js/ajax-dynamic-list.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include_once '../includes/php/header.php'; ?>
        <div class="container">
            <legend>Cuotas de Poliza</legend>
            <?php
            if (count($oCuota) > 0) {
                ?>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>N&ordm; Poliza</th>
                        <th>Cuota</th>
                        <th>Monto</th>
                        <th>1&ordf; vencimiento</th>
                        <th>2&ordf; vencimiento</th>
                        <th>Fecha Pago</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    foreach ($oCuota as $aCuota) {
                        ?>
                        <tr class="<?php echo ($aCuota->get_fechapago() != '0000-00-00') ? 'success' : 'text-danger'; ?>">
                            <th><?php echo $aCuota->get_nropoliza(); ?></th>
                            <th><?php echo $aCuota->get_nrocuota(); ?></th>
                            <td><?php echo '$' . $aCuota->get_monto(); ?></td>
                            <td><?php echo $aCuota->get_vencimiento1(); ?></td>
                            <td><?php echo $aCuota->get_vencimiento2(); ?></td>
                            <td><?php echo ($aCuota->get_fechapago() != '0000-00-00') ? $aCuota->get_fechapago() : 'Impaga'; ?></td>
                            <td>
                                <a class="glyphicon glyphicon-usd" href="#" data-toggle="modal" data-target="#myModal" 
                                   onclick="altaModal(<?php
                                   echo "'" . $aCuota->get_nropoliza() . "', " . $aCuota->get_nrocuota() . ', ' . $aCuota->get_monto() . ", '"
                                   . $aCuota->get_vencimiento1() . "', '" . $aCuota->get_vencimiento2() . "'";
                                   ?>)" ></a>
                                <img src="../images/editar.png" alt="" onclick=""/>
                                <img src="../images/borrar.png" alt="" onclick=""/>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Cobro de cuota</h4>
                            </div>
                            <div class="modal-body" id="cuerpoModal">
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="botonModal1" class="btn btn-primary" onclick="guardarModal()">Realizar Cobro</button>
                                <button type="button" id="botonModal2" class="btn btn-primary" data-dismiss="modal" onclick="location.reload();">Cancelar Cobro</button>
                            </div>
                        </div>
                    </div>
                </div>
                <input id="guardarModal" type="hidden" value="" />
                <?php
            } else {
                ?>
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="alert alert-warning text-center text-" role="alert">
                        <strong>El cliente no posee cuotas cargadas para la poliza <?php echo $nropoliza;?>.</strong>
                    </div>
                </div>
                <?php
            }
            ?>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <input type="button" id="volver" value="Volver" class="btn btn-large btn-block btn-primary " onclick="window.history.back();" />
                </div>
                <div class="col-sm-2">
                    <input type="button" id="volver" value="Alta cuota" 
                           class="btn btn-large btn-block btn-primary " 
                           onclick="location.href='altaCuotas.php?nropoliza=<?php echo $nropoliza; ?>';" />
                </div>
                <div class="col-sm-8" id="divResultado"></div>
            </div>
        </div>
        <?php // include_once '../includes/php/footer.php';  ?>
        <script src="../bootstrap/js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>