<?php
extract($_POST, EXTR_OVERWRITE);
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlCuotas = $oMysql->getCuotaActiveRecord();
$oCuota = new CuotasValueObject;

mysql_query("BEGIN;");
$error = 0;

$oCuota->set_nropoliza($nropoliza);
$oCuota->set_nrocuota($nrocuota);
$oCuota->set_pago(1);
$oCuota->set_fechapago($fechapago);
$oCuota->setRecibo($recibo);
$oCuota->set_vencimiento1($vencimiento1);
$oCuota->set_vencimiento2($vencimiento2);
$oCuota->set_monto($monto);

/* Actualizo con la fecha de cobro (en la que se pago la cuota). */
if (!$oMysqlCuotas->actualizar($oCuota)) {
    $error = 1;
}

if ($error == 0) {
    mysql_query("COMMIT;");
    ?>
    <div class="form-group has-success">
        <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="form-group has-error">
        <input type="text" value="Los Datos No Han Sido Almacenados. Error n° <?php echo $error; ?>" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
}