<?php
extract($_POST, EXTR_OVERWRITE);
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlPoliza = $oMysql->getPolizaActiveRecord();
$oPoliza = new PolizasValueObject();
$oPoliza->set_nropoliza($nropoliza);

$oPoliza = $oMysqlPoliza->buscar($oPoliza);
?>
<input type="hidden" name="p01" id="p01"  value="<?php echo $oPoliza->get_idcompanias(); ?>" />
<input type="hidden" name="p02" id="p02"  value="<?php echo $oPoliza->get_idclientes(); ?>" />
<input type="hidden" name="p03" id="p03"  value="<?php echo $oPoliza->get_patente(); ?>" />
<input type="hidden" name="p04" id="p04"  value="<?php echo $oPoliza->get_idcoberturas(); ?>" />
<input type="hidden" name="p05" id="p05"  value="<?php echo $oPoliza->get_idotrosriesgos(); ?>" />
<input type="hidden" name="p06" id="p06"  value="<?php echo $oPoliza->get_vigenciadesde(); ?>" />
<input type="hidden" name="p07" id="p07"  value="<?php echo $oPoliza->get_vigenciahasta(); ?>" />
<input type="hidden" name="p08" id="p08"  value="<?php echo $oPoliza->get_segvencimiento(); ?>" />
<input type="hidden" name="p09" id="p09"  value="<?php echo $oPoliza->get_premio(); ?>" />
<input type="hidden" name="p10" id="p10"  value="<?php echo $oPoliza->get_prima(); ?>" />
<input type="hidden" name="p11" id="p11"  value="<?php echo $oPoliza->get_cuotas(); ?>" />
<input type="hidden" name="p12" id="p12"  value="<?php echo $oPoliza->get_idformaspago(); ?>" />
<input type="hidden" name="p13" id="p13"  value="<?php echo $oPoliza->get_cbu(); ?>" />