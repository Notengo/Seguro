<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$apellido = $_POST["apellido"];
$nombre = $_POST['nombre'];
$nacimiento = $_POST['nacimiento'];
$tipodoc = $_POST['tipodoc'];
$documento = $_POST['documento'];
$cuit = $_POST['cuit'];
$condicionfiscal = $_POST['condicionfiscal'];
$cp = $_POST['cp'];
$localidad = $_POST['localidad'];
$localidad_hidden = $_POST['localidad_hidden'];
$barrio = $_POST['barrio'];
$barrio_hidden = $_POST['barrio_hidden'];
$calle = $_POST['calle'];
$calle_hidden = $_POST['calle_hidden'];
$numero = $_POST['numero'];
$piso = $_POST['piso'];
$dpto = $_POST['dpto'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];

$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();
$oCliente->set_apellido($apellido);
$oCliente->set_nombre($nombre);
$oCliente->set_fechanacimiento($nacimiento);
$oCliente->set_idtipodocumentos($tipodoc);
$oCliente->set_documento($documento);
$oCliente->set_cc($cuit);
//$oCliente->set_idcondfiscales($condicionfiscal);
$oCliente->set_idcondfiscales(1);
$oCliente->set_cp($cp);
$oCliente->set_idlocalidad($localidad_hidden);
$oCliente->set_idbarrios($barrio_hidden);
//$oCliente->set_idcalles($calle);
$oCliente->set_altura($numero);
$oCliente->set_piso($piso);
$oCliente->set_dpto($dpto);
$oCliente->set_email($correo);

/* Veo si existe la calle para buscar su id o almacenarla. */
$oMysqlCalle = $oMysql->getCallesActiveRecord();
$oCalle = new CallesValueObject();
$oCalle->setNombre($calle);

if($oMysqlCalle->existe($oCalle) > 0){
    $oCallePrueba = $oMysqlCalle->buscarPorNombre($oCalle);
    $oCliente->set_idcalles($oCallePrueba->getIdcalles());
} else {
    $oMysqlCalle->guardar($oCalle);
    $oCliente->set_idcalles($oCalle->getIdcalles());
}
/* Fin de buscar la calle. */
$error = 0;
/* Grabacion del cliente. */
if ($_POST['accion'] == 'Guardar'){
    if(!$oMysqlCliente->guardar($oCliente)){
        $error = 1;
    }
    /* Comienzo Almacenamiento de los telefonos. */
    $oMysqlTel = $oMysql->getTelefonosActiveRecord();
    $oTelefono = new TelefonosValueObject();
    if($telefono != ''){
        $oTelefono->set_idclientes($oCliente->get_idclientes());
        $oTelefono->set_numero($telefono);
        if($oMysqlTel->guardar($oTelefono)){
            $error = 3;
        }
    }
    if($celular != ''){
        $oTelefono->set_idclientes($oCliente->get_idclientes());
        $oTelefono->set_numero($celular);
        if($oMysqlTel->guardar($oTelefono)){
            $error = 4;
        }
    }
    /* Fin Almacenamiento de los telefonos. */
} else {
    if(!$oMysqlCliente->actualizar($oCliente)){
        $error = 2;
    }
}
echo $error;

//$error = 1;

if($error == 0){
    mysql_query("COMMIT;");
    ?>
    <div class="form-group has-success">
        <div class="col-xs6">
            <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="form-group has-error">
        <div class="col-xs6">
            <input type="text" value="Los Datos No Han Sido Almacenados" class="form-control">
            <span class="input-icon fui-check-inverted"></span>
        </div>
    </div>
    <?php
}