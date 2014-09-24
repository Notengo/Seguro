<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlVehiculo = $oMysql->getVehiculoActiveRecord();
$oVehiculo = new VehiculosValueObject();
$oVehiculo->set_idvehiculos($_POST['idvehiculo']);

$oVehiculo = $oMysqlVehiculo->buscar($oVehiculo);

$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente->set_idclientes($oVehiculo->get_idclientes());
$oCliente = $oMysqlCliente->buscar($oCliente);

$oMysqlMarca = $oMysql->getMarcasActiveRecord();
$oMarca = new MarcasValueObject();
$oMarca->set_idmarcas($oVehiculo->get_idmarcas());
$oMarca = $oMysqlMarca->buscar($oMarca);

$oMysqlModelo = $oMysql->getModelosActiveRecord();
$oModelo = new ModelosValueObject();
$oModelo->set_idmodelos($oVehiculo->get_idmodelos());
$oModelo = $oMysqlModelo->buscar($oModelo);

$oMysqlTipos = $oMysql->getTiposActiveRecord();
$oTipos = new TiposValueObject();
$oTipos->set_idtipos($oVehiculo->get_idtipos());
$oTipos = $oMysqlTipos->buscar($oTipos);

$oMysqlUsos = $oMysql->getUsosActiveRecord();
$oUsos = new UsosValueObject();
$oUsos->set_idusos($oVehiculo->get_idusos());
$oUsos = $oMysqlUsos->buscar($oUsos);

/* Aca tengo que buscar las imagenes para poder mostrar en pantalla. */
/* Comienzo busqueda de imagenes */

$oMysqlImagenes = $oMysql->getImagenesActiveRecord();
$oImagenes = new ImagenesValueObject();
$oImagenes->set_idvehiculos($oVehiculo->get_idvehiculos());
$oImagenes = $oMysqlImagenes->buscar($oImagenes);

/* Fin busqueda de imagenes */

$oMysqlGnc = $oMysql->getGncActiveRecord();
$oGnc = new GncValueObject();
$oGnc->set_idvehiculos($oVehiculo->get_idvehiculos());
$oGnc = $oMysqlGnc->buscarPorVehiculo($oGnc);
if($oGnc){
 /* Buscar los cilindros */   
}
?>
<input id="v01" type="hidden" value="<?php echo $oVehiculo->get_idvehiculos(); ?>" />
<input id="v02" type="hidden" value="<?php echo $oVehiculo->get_idclientes(); ?>" />
<input id="v021" type="hidden" value="<?php echo $oCliente->get_apellido() . ', ' . $oCliente->get_nombre(); ?>" />
<input id="v03" type="hidden" value="<?php echo $oVehiculo->get_patente(); ?>" />
<input id="v04" type="hidden" value="<?php echo $oVehiculo->get_motor(); ?>" />
<input id="v05" type="hidden" value="<?php echo $oVehiculo->get_chacis(); ?>" />
<input id="v06" type="hidden" value="<?php echo $oVehiculo->get_fechafabricacion(); ?>" />
<input id="v07" type="hidden" value="<?php echo $oVehiculo->get_idmarcas(); ?>" />
<input id="v071" type="hidden" value="<?php echo $oMarca->get_descripcion(); ?>" />
<input id="v08" type="hidden" value="<?php echo $oVehiculo->get_idmodelos(); ?>" />
<input id="v081" type="hidden" value="<?php echo $oModelo->get_descripcion(); ?>" />
<input id="v09" type="hidden" value="<?php echo $oVehiculo->get_version(); ?>" />
<input id="v10" type="hidden" value="<?php echo $oVehiculo->get_idtipos(); ?>" />
<input id="v101" type="hidden" value="<?php echo $oTipos->get_descripcion(); ?>" />
<input id="v11" type="hidden" value="<?php echo $oVehiculo->get_idusos(); ?>" />
<input id="v111" type="hidden" value="<?php echo $oUsos->get_descripcion(); ?>" />
<input id="v12" type="hidden" value="<?php echo $oVehiculo->get_naftero(); ?>" />
<input id="v13" type="hidden" value="<?php echo $oVehiculo->get_valorasegurado(); ?>" />

<input id="v14" type="hidden" value="<?php echo ($oGnc) ? $oGnc->get_idgnc():''; ?>" />
<input id="v15" type="hidden" value="<?php echo ($oGnc) ? $oGnc->get_regulador():''; ?>" />
<input id="v16" type="hidden" value="<?php echo ($oGnc) ? $oGnc->get_marca():''; ?>" />

<!-- Imagenes -->
<?php
if(isset($oImagenes[0])) {
    ?>
    <img style="display: none;" src="verimagen.php?nro=1&idVehiculos=<?php echo $oVehiculo->get_idvehiculos();?>" id="v17" alt="seguros Adue"/>
    <?php
} else {
    ?>
    <img style="display: none;" src="#" id="v17" alt="no"/>
    <?php
}

if(isset($oImagenes[1])) {
    ?>
    <img style="display: none;" src="verimagen.php?nro=2&idVehiculos=<?php echo $oVehiculo->get_idvehiculos();?>" id="v18" alt="seguros Adue"/>
    <?php
} else {
    ?>
    <img style="display: none;" src="#" id="v18" alt="no"/>
    <?php
}

if(isset($oImagenes[2])) {
    ?>
    <img style="display: none;" src="verimagen.php?nro=3&idVehiculos=<?php echo $oVehiculo->get_idvehiculos();?>" id="v19" alt="seguros Adue"/>
    <?php
} else {
    ?>
    <img style="display: none;" src="#" id="v19" alt="no"/>
    <?php
}

if(isset($oImagenes[3])) {
    ?>
    <img style="display: none;" src="verimagen.php?nro=4&idVehiculos=<?php echo $oVehiculo->get_idvehiculos();?>" id="v20" alt="seguros Adue"/>
    <?php
} else {
    ?>
    <img style="display: none;" src="#" id="v20" alt="no" />
    <?php
}