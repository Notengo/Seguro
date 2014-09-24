<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlPoliza = $oMysql->getPolizaActiveRecord();
$oPoliza = new PolizasValueObject();
$oPoliza = $oMysqlPoliza->buscarTodo();

$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente = $oMysqlCliente->buscarTodo();
$cliente = array();
foreach ($oCliente as $aCliente) {
    $cliente[$aCliente->get_idclientes()] = $aCliente->get_apellido() . ' ' . $aCliente->get_nombre();
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
        <table class="table table-striped table-bordered table-hover tab-pane table-condensed">
            <tr>
                <th>Clietne</th>
                <th>N&uacute;mero de Poliza</th>
                <th>Veh&iacute;culo</th>
                <th></th></tr>
            <?php
            foreach ($oPoliza as $aPoliza) {
                ?>
                <tr>
                    <td><?php echo $cliente[$aPoliza->get_idclientes()]; ?></td>
                    <td><?php echo $aPoliza->get_nropoliza(); ?></td>
                    <td><?php echo $aPoliza->get_patente(); ?></td>
                    <td>
                        <a class="glyphicon glyphicon-usd" href="altaCuotas.php"></a>
                        <img src="../images/editar.png" alt="" onclick="verVehiculo(<?php // echo $aVehiculo->get_idvehiculos();   ?>, 'e', <?php // echo $vehiculos;   ?>)"/>
                        <img src="../images/borrar.png" alt="" onclick="verVehiculo(<?php // echo $aVehiculo->get_idvehiculos();   ?>, 'b', '<?php // echo $aModelo->get_descripcion();   ?>', <?php // echo $aModelo->get_idmarcas();   ?>)"/>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>
    </body>    
</html>
