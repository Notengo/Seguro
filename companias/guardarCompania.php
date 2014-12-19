<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$error = 0;
$cuitPreseteado=00000000;
$callePresetada="S/C";
$nroPreseteado = 0;
$pisoPreseteado = 0;
$dptoPreseteado = 0;
$cpPeseteado = 0;
$telefonoPreseteado=0;
$correoPreseteado="ninguno";
$web="ninguno";
$oMysqlCompania = $oMysql->getCompaniaActiveRecord();
$oCompania = new CompaniasValueObject();

$oCompania->set_razonsocial(strtoupper($_POST['razonSocial']));
$oCompania->set_nroproductor($_POST['nroproductor']);

if($_POST['cuit']=="")
{$oCompania->set_cuit($cuitPreseteado);}
else{$oCompania->set_cuit($_POST['cuit']);}
if($_POST['calle']=="")
{$oCompania->set_direccion($callePresetada);}
 else {$oCompania->set_direccion(strtoupper($_POST['calle']));}
 if($_POST['nro']=="")
 {
     $oCompania->set_numero($nroPreseteado);
 }else{$oCompania->set_numero($_POST['nro']);}
if($_POST['piso']=="")
{
    $oCompania->set_piso($pisoPreseteado);
}else{$oCompania->set_piso($_POST['piso']);}
if($_POST['dpto']=="")
{
  $oCompania->set_depto($dptoPreseteado);  
}
else{$oCompania->set_depto($_POST['dpto']);}
if($_POST['cp']=="")
{
    $oCompania->set_cp($cpPeseteado);
}else{$oCompania->set_cp($_POST['cp']);}
if($_POST['telefono']=="")
{
    $oCompania->set_telefono($telefonoPreseteado);
}else{$oCompania->set_telefono($_POST['telefono']);}
if($_POST['email']=="")
{
    $oCompania->set_email(strtoupper($correoPreseteado));
}else{$oCompania->set_email(strtoupper($_POST['email']));}
if($_POST['pagina']=="")
{
    $oCompania->set_link(strtoupper($web));
}
else{$oCompania->set_link(strtoupper($_POST['pagina']));}


mysql_query("BEGIN;");
if($_POST['accion'] == 'Guardar'){
    if(!$oMysqlCompania->guardar($oCompania)){
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