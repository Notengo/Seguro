<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();
$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente->set_idclientes($_POST['idclientes']);
$oCliente = $oMysqlCliente->buscar($oCliente);
?>
<input type="hidden" name="cliente01" id="cliente01" value="<?php echo $oCliente->get_apellido(); ?>" />
<input type="hidden" name="cliente02" id="cliente02" value="<?php echo $oCliente->get_nombre(); ?>" />
<input type="hidden" name="cliente03" id="cliente03" value="<?php echo $oCliente->get_fechanacimiento(); ?>" />
<input type="hidden" name="cliente04" id="cliente04" value="<?php echo $oCliente->get_idtipodocumentos(); ?>" />
<input type="hidden" name="cliente05" id="cliente05" value="<?php echo $oCliente->get_documento(); ?>" />
<input type="hidden" name="cliente06" id="cliente06" value="<?php echo $oCliente->get_cc1(); ?>" />
<input type="hidden" name="cliente07" id="cliente07" value="<?php echo $oCliente->get_cc2(); ?>" />
<input type="hidden" name="cliente08" id="cliente08" value="<?php echo $oCliente->get_cp(); ?>" />
<input type="hidden" name="cliente09" id="cliente09" value="<?php echo $oCliente->get_idlocalidad(); ?>" />
<input type="hidden" name="cliente10" id="cliente10" value="<?php echo $oCliente->get_idbarrios(); ?>" />
<input type="hidden" name="cliente11" id="cliente11" value="<?php echo $oCliente->get_idcalles(); ?>" />
<input type="hidden" name="cliente12" id="cliente12" value="<?php echo $oCliente->get_altura(); ?>" />
<input type="hidden" name="cliente13" id="cliente13" value="<?php echo $oCliente->get_piso(); ?>" />
<input type="hidden" name="cliente14" id="cliente14" value="<?php echo $oCliente->get_dpto(); ?>" />
<input type="hidden" name="cliente15" id="cliente15" value="<?php echo $oCliente->get_email(); ?>" />
<!--<input type="hidden" name="cliente16" id="cliente16" value="<?php //echo $oCliente->get_ ?>" />
<input type="hidden" name="cliente17" id="cliente17" value="<?php //echo $oCliente->get_ ?>" />
<input type="hidden" name="cliente18" id="cliente18" value="<?php //echo $oCliente->get_ ?>" />
<input type="hidden" name="cliente19" id="cliente19" value="<?php //echo $oCliente->get_ ?>" />
<input type="hidden" name="cliente20" id="cliente20" value="<?php //echo $oCliente->get_ ?>" />-->