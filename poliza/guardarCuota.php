<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlCuotas = $oMysql->getCuotaActiveRecord();
$oCuota = new CuotasValueObject;

mysql_query("BEGIN;");
$error = 0;

$poliza = $_POST["poliza"];
$cuotas = $_POST['cuotas'];
$monto = $_POST['monto'];
$ven1 = $_POST['ven1'];
$ven2 = $_POST['ven2'];
$pagada = $_POST['pagada'];
$fechapago = $_POST['fechapago'];

$oCuota->set_nropoliza($poliza);
$oCuota->set_nrocuota($cuotas);
$oCuota->set_monto($monto);
$oCuota->set_vencimiento1($ven1);
$oCuota->set_vencimiento2($ven2);
$oCuota->set_pago($pagada);
$oCuota->set_fechapago($fechapago);

/* Grabacion de cuotas. */
$accion = 'Guardar';
if ($accion == 'Guardar') {
    if (!$oMysqlCuotas->guardar($oCuota)) {
        $error = 1;
    }
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