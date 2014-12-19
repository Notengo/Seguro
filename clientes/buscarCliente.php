<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente->set_idclientes($_POST['idclientes']);
$oCliente = $oMysqlCliente->buscar($oCliente);
//var_dump($oCliente);

$oMysqlCalle = $oMysql->getCallesActiveRecord();
$oCalle = new CallesValueObject();
$oCalle->setIdcalles($oCliente->get_idcalles());
if ($oCliente->get_idcalles() != '') {
    $oCalle = $oMysqlCalle->buscar($oCalle);
} else {
    $oCalle->setNombre('');
}

$oMysqlBarrio = $oMysql->getBarriosActiveRecord();
$oBarrio = new BarriosValueObject();
$oBarrio->set_idbarrios($oCliente->get_idbarrios());

if ($oCliente->get_idbarrios() != '') {
    $oBarrio = $oMysqlBarrio->buscar($oBarrio);
} else {
    $oBarrio->Set_nombre('');
}

$oMysqlLocalidad = $oMysql->getLocalidadesActiveRecord();
$oLocalidad = new LocalidadesValueObject();
$oLocalidad->set_idlocalidades($oCliente->get_idlocalidad());
if ($oCliente->get_idlocalidad()) {
    $oLocalidad = $oMysqlLocalidad->buscar($oLocalidad);
} else {
    $oLocalidad->set_localidad('');
}

$oMysqlTel = $oMysql->getTelefonosActiveRecord();
$oTelefono = new TelefonosValueObject();
$oTelefono->set_idclientes($oCliente->get_idclientes());
$oTelefono = $oMysqlTel->buscarPorCliente($oTelefono);


/* Invierto la fecha de nacimiento */
if (strpos($oCliente->get_fechanacimiento(), '-') !== false) {
    $fecha = explode('-', $oCliente->get_fechanacimiento());
    $oCliente->set_fechanacimiento($fecha[2] . '/' . $fecha[1] . '/' . $fecha[0]);
}
?>
<input type="hidden" name="cliente" id="cliente" value="<?php echo $oCliente->get_idclientes(); ?>" />
<input type="hidden" name="cliente01" id="cliente01" value="<?php echo $oCliente->get_apellido(); ?>" />
<input type="hidden" name="cliente02" id="cliente02" value="<?php echo $oCliente->get_nombre(); ?>" />
<input type="hidden" name="cliente03" id="cliente03" value="<?php echo $oCliente->get_fechanacimiento(); ?>" />
<input type="hidden" name="cliente04" id="cliente04" value="<?php echo $oCliente->get_idtipodocumentos(); ?>" />
<input type="hidden" name="cliente05" id="cliente05" value="<?php echo $oCliente->get_documento(); ?>" />
<input type="hidden" name="cliente06" id="cliente06" value="<?php echo $oCliente->get_cc(); ?>" />
<input type="hidden" name="cliente07" id="cliente07" value="<?php echo $oCliente->get_idcondfiscales(); ?>" />
<input type="hidden" name="cliente08" id="cliente08" value="<?php echo $oCliente->get_cp(); ?>" />
<input type="hidden" name="cliente09" id="cliente09" value="<?php echo $oCliente->get_idlocalidad(); ?>" />
<input type="hidden" name="cliente09" id="cliente23" value="<?php echo $oLocalidad->get_localidad(); ?>" />
<input type="hidden" name="cliente10" id="cliente10" value="<?php echo $oCliente->get_idbarrios(); ?>" />
<input type="hidden" name="cliente22" id="cliente22" value="<?php echo utf8_encode($oBarrio->get_nombre()); ?>" />
<!--Aca Tengo que cargar el nombre de la calle ademas del id correspondiente.-->
<input type="hidden" name="cliente11" id="cliente11" value="<?php echo $oCliente->get_idcalles(); ?>" />
<input type="hidden" name="cliente11" id="cliente21" value="<?php echo utf8_encode($oCalle->getNombre()); ?>" />

<input type="hidden" name="cliente12" id="cliente12" value="<?php echo $oCliente->get_altura(); ?>" />
<input type="hidden" name="cliente13" id="cliente13" value="<?php echo $oCliente->get_piso(); ?>" />
<input type="hidden" name="cliente14" id="cliente14" value="<?php echo $oCliente->get_dpto(); ?>" />
<input type="hidden" name="cliente15" id="cliente15" value="<?php echo $oCliente->get_email(); ?>" />
<!--<input type="hidden" name="cliente16" id="cliente16" value="<?php //echo $oCliente->get_       ?>" />-->
<?php
if (count($oTelefono) == 2) {
    ?>
    <input type="hidden" name="cliente17" id="cliente17" value="<?php echo $oTelefono[0]->get_numero(); ?>" />
    <input type="hidden" name="cliente18" id="cliente18" value="<?php echo $oTelefono[1]->get_numero(); ?>" />
    <?php
} else if (count($oTelefono) == 1) {
    ?>
    <input type="hidden" name="cliente17" id="cliente17" value="<?php echo $oTelefono[0]->get_numero(); ?>" />
    <input type="hidden" name="cliente18" id="cliente18" value="" />
    <?php
} else if (count($oTelefono) == 0) {
    ?>
    <input type="hidden" name="cliente17" id="cliente17" value="" />
    <input type="hidden" name="cliente18" id="cliente18" value="" />
    <?php
}
?>
<!--<input type="hidden" name="cliente19" id="cliente19" value="<?php //echo $oCliente->get_       ?>" />
<input type="hidden" name="cliente20" id="cliente20" value="<?php //echo $oCliente->get_       ?>" />-->