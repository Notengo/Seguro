<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlPoliza = $oMysql->getPolizaActiveRecord();
$oPoliza = new PolizasValueObject();

$oMysqlMarcas = $oMysql->getMarcasActiveRecord();
$oMarcas = new MarcasValueObject();
$oMarcas = $oMysqlMarcas->buscarTodo();
$marcas = array();
foreach ($oMarcas as $aMarcas) {
    $marcas[$aMarcas->get_idmarcas()] = $aMarcas->get_descripcion();
}
unset($oMarcas);

$oMysqlModelos = $oMysql->getModelosActiveRecord();
$oModelos = new ModelosValueObject();
$oModelos = $oMysqlModelos->buscarTodo();
$modelos = array();
foreach ($oModelos as $aModelos) {
    $modelos[$aModelos->get_idmarcas()][$aModelos->get_idmodelos()] = $aModelos->get_descripcion();
}
unset($oModelos);

$oMysqlVehiculo = $oMysql->getVehiculoActiveRecord();
$oVehiculo = new VehiculosValueObject();
$oVehiculo = $oMysqlVehiculo->buscarTodo();
$vehiculos = array();
foreach ($oVehiculo as $aVehiculo) {
    if ($aVehiculo->get_idmarcas() != 0 && $aVehiculo->get_idmodelos() != 0) {
        $vehiculos[$aVehiculo->get_patente()] = $marcas[$aVehiculo->get_idmarcas()] . ", " . $modelos[$aVehiculo->get_idmarcas()][$aVehiculo->get_idmodelos()];
    } elseif ($aVehiculo->get_idmarcas() == 0 && $aVehiculo->get_idmodelos() != 0) {
        $vehiculos[$aVehiculo->get_patente()] = $marcas[$aVehiculo->get_idmarcas()];
    }
}

$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente = $oMysqlCliente->buscarTodo();
$cliente = array();
foreach ($oCliente as $aCliente) {
    $cliente[$aCliente->get_idclientes()] = $aCliente->get_apellido() . ' ' . $aCliente->get_nombre();
}
if (!isset($usu)) {
    $oPoliza = $oMysqlPoliza->buscarTodo();
} else {
    $oPoliza->set_idclientes($usu);
    $oPoliza = $oMysqlPoliza->buscarTodoCliente($oPoliza);
}
unset($oCliente);
unset($oMysqlCliente);
?>
<html>
    <head>
        <link type="text/css" href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link type="text/css" href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="../includes/css/otros.css" rel="stylesheet" type="text/css"/>    
    </head>
    <body>
        <?php
        if (count($oPoliza) > 0) {
            ?>
            <table class="table table-hover tab-pane table-condensed">
                <tr class="success">
                    <th>Cliente</th>
                    <th>N&uacute;mero de Poliza</th>
                    <th>Veh&iacute;culo</th>
                    <th></th></tr>
                <?php
                foreach ($oPoliza as $aPoliza) {
                    if ($aPoliza->get_fechabaja() != '0000-00-00 00:00:00') {
                        ?>
                        <tr class="danger">
                            <td><?php echo $cliente[$aPoliza->get_idclientes()]; ?></td>
                            <td><?php echo $aPoliza->get_nropoliza(); ?></td>
                            <td><?php echo $aPoliza->get_patente() . ", " . $vehiculos[$aPoliza->get_patente()]; ?></td>
                            <td>
                                <a class="glyphicon glyphicon-retweet" onclick="editarPoliza(<?php echo "'" . $aPoliza->get_nropoliza() . "'"; ?>, 'r')" title="Renovaci&oacute;n de poliza"></a>
                            </td>
                        </tr>
                        <?php
                    } else {
                        ?>
                        <tr class="<?php echo ($aPoliza->get_vigenciahasta() < date('Y-m-d')) ? 'warning' : ''; ?>">
                            <td><?php echo $cliente[$aPoliza->get_idclientes()]; ?></td>
                            <td><?php echo $aPoliza->get_nropoliza(); ?></td>
                            <td><?php echo $aPoliza->get_patente() . ", " . $vehiculos[$aPoliza->get_patente()]; ?></td>
                            <td>
                                <a class="glyphicon glyphicon-usd" href="../cuotas/index.php?nropoliza=<?php echo $aPoliza->get_nropoliza(); ?>" title="Cobro cuotas"></a>
                                <a class="glyphicon glyphicon-edit" onclick="editarPoliza(<?php echo "'" . $aPoliza->get_nropoliza() . "'"; ?>, 'e')" title="Edici&oacute;n poliza"></a>
                                <a class="glyphicon glyphicon-remove text-danger" onclick="editarPoliza(<?php echo "'" . $aPoliza->get_nropoliza() . "'"; ?>, 'b')" title="Eliminaci&oacute;n poliza"></a>
                                <a class="glyphicon glyphicon-retweet" onclick="editarPoliza(<?php echo "'" . $aPoliza->get_nropoliza() . "'"; ?>, 'r')" title="Renovaci&oacute;n de poliza"></a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <?php
        } else {
            ?>
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="alert alert-warning text-center text-" role="alert">
                    <strong>El cliente no posee polizas vigentes.</strong>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="row">
            <div class="col-sm-2">
                <input type="button" id="volver" value="Volver" class="btn btn-large btn-block btn-primary " onclick="window.history.back();" />
            </div>
            <div class="col-sm-8" id="divResultado"></div>
        </div>
    </body>    
</html>