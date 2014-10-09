<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlPoliza = $oMysql->getPolizaActiveRecord();
$oPoliza = new PolizasValueObject();

$error = 0;

mysql_query("BEGIN;");

$oMysqlCuotas = $oMysql->getCuotaActiveRecord();
$oCuota = new CuotasValueObject;
$accion = $_POST['accion'];
$oPoliza->set_nropoliza($_POST['nropoliza']);
if ($accion == "Guardar" || $accion == "Renovar") {
    $oPoliza->set_idcompanias($_POST['idcompanias']);
    $oPoliza->set_idclientes($_POST['idclientes']);
    $oPoliza->set_patente($_POST['patente']);
    $oPoliza->set_idcoberturas($_POST['idcoberturas']);
    $oPoliza->set_idotrosriesgos($_POST['idotrosriesgos']);
    $oPoliza->set_vigenciadesde($_POST['vigenciadesde']);
    $oPoliza->set_vigenciahasta($_POST['vigenciahasta']);
    $oPoliza->set_segvencimiento($_POST['segvencimiento']);
    $oPoliza->set_premio($_POST['premio']);
    $oPoliza->set_prima($_POST['prima']);
    $oPoliza->set_cuotas($_POST['cuotas']);
    $oPoliza->set_idformaspago($_POST['idformaspago']);
    $oPoliza->set_cbu($_POST['cbu']);

    if (!$oMysqlPoliza->guardar($oPoliza)) {
        $error = 1;
    }


    $vigenciaDesde = explode('-', $_POST['vigenciadesde']);

    $oCuota->set_nropoliza($_POST['nropoliza']);
    $oCuota->set_monto($_POST['premio'] / $_POST['cuotas']);
    for ($i = 1; $i <= $_POST['cuotas']; $i++) {
        $oCuota->set_nrocuota($i);

        /*
         * Si el dia del segundo vencimiento es  menor que el del primer vencimiento,
         * el mes del segundo vencimiento aumenta en 1, y se el mes es 12 y aumenta en 1
         * el año aumenta en 1
         */

        /* Seteo de la fecha de vigencia desde. */
        $anio = $vigenciaDesde[0];
        $mes = ($vigenciaDesde[1] + $i - 1);
        if ($mes >= 13) {
            $mes = $mes - 12;
            $anio ++;
        }

        $oCuota->set_vencimiento1($anio . "-" . $mes . "-" . $vigenciaDesde[2]);

        /* Segundo vencimiento. */
        $mes2 = $mes;
        if ($_POST['segvencimiento'] <= $vigenciaDesde[2]) {
            $mes2 = $mes + 1;
        }

        $anio2 = $anio;
        if ($mes2 >= 13) {
            $mes2 = $mes2 - 12;
            $anio2 ++;
        }

        $oCuota->set_vencimiento2($anio2 . "-" . $mes2 . "-" . $_POST['segvencimiento']);

        if (!$oMysqlCuotas->guardar($oCuota)) {
            $error = 2;
        }
    }
}

if ($accion == "Eliminar") {
    $oPoliza->set_fechabaja(date('Y-m-d'));
    if (!$oMysqlPoliza->borrar($oPoliza)) {
        $error = 3;
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