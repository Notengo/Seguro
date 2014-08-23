<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
//require_once '../clases/ActiveRecord/MysqlActiveRecordAbstractFactory.php';

$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlVehiculo = $oMysql->getVehiculoActiveRecord();
$oVehiculo = new VehiculosValueObject();
$oVehiculo = $oMysqlVehiculo->buscarTodo();

$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente = $oMysqlCliente->buscarTodo();
$cliente = array();
foreach ($oCliente as $aCliente) {
    $cliente[$aCliente->get_idclientes()]=$aCliente->get_apellido() . ' ' . $aCliente->get_nombre();
}
unset($oCliente);
unset($oMysqlCliente);

$oMysqlMarcas = $oMysql->getMarcasActiveRecord();
$oMarcas = new MarcasValueObject();
$oMarcas = $oMysqlMarcas->buscarTodo();

$oMysqlModelo = $oMysql->getModelosActiveRecord();
$oModelo = new ModelosValueObject();
$oModelo = $oMysqlModelo->buscarTodo();

$marcas = array();
foreach ($oMarcas as $aMarcas) {
    $marcas[$aMarcas->get_idmarcas()]=$aMarcas->get_descripcion();
}
$modelos = array();
foreach ($oModelo as $aModelo) {
    $modelos[$aModelo->get_idmodelos()]=$aModelo->get_descripcion();
}
?>
<table class="table table-striped table-bordered table-hover table-responsive">
    <tr>
        <th>Asegurado</th>
        <th>Matricula</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th></th>
    </tr>
    <?php
    foreach ($oVehiculo as $aVehiculo) {
        ?>
        <tr>
            <td><?php echo $cliente[$aVehiculo->get_idclientes()]; ?></td>
            <td><?php echo $aVehiculo->get_patente(); ?></td>
            <td><?php echo $marcas[$aVehiculo->get_idmarcas()]; ?></td>
            <td><?php echo $modelos[$aVehiculo->get_idmodelos()]; ?></td>
            <td>
                <img src="../images/editar.png" alt="" onclick="verVehiculo(<?php echo $aVehiculo->get_idvehiculos(); ?>, 'e', '<?php echo $aModelo->get_descripcion(); ?>', <?php echo $aModelo->get_idmarcas(); ?>)"/>
                <img src="../images/borrar.png" alt="" onclick="verVehiculo(<?php echo $aVehiculo->get_idvehiculos(); ?>, 'b', '<?php echo $aModelo->get_descripcion(); ?>', <?php echo $aModelo->get_idmarcas(); ?>)"/>
            </td>
        </tr>
        <?php
        unset($oModelo);
    }
    ?>
</table>