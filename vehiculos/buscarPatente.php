<?php

require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlVehiculo = $oMysql->getVehiculoActiveRecord();
$oVehiculo = new VehiculosValueObject();
$oVehiculo->set_patente($_POST['patente']);

$oVehiculo = $oMysqlVehiculo->buscarPatente($oVehiculo);

if ($oVehiculo) {
    ?>
    <input id="encontro" type="hidden" value="Si" />
    <?php

} else {
    ?>
    <input id="encontro" type="hidden" value="No" />
    <?php

}

