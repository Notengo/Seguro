<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlPoliza = $oMysql->getPolizaActiveRecord();
$oPoliza = new PolizasValueObject();

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
            <tr>
                <td>Prueba</td>
                <td>Prueba</td>
                <td>Prueba</td>
                <td>
                    <img src="../images/editar.png" alt="" onclick="verVehiculo(<?php // echo $aVehiculo->get_idvehiculos(); ?>, 'e', <?php // echo $vehiculos; ?>)"/>
                    <img src="../images/borrar.png" alt="" onclick="verVehiculo(<?php // echo $aVehiculo->get_idvehiculos(); ?>, 'b', '<?php // echo $aModelo->get_descripcion(); ?>', <?php // echo $aModelo->get_idmarcas(); ?>)"/>
                </td>
            </tr>
        </table>
    </body>    
</html>
