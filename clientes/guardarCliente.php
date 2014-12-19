<?php
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
$oMysql = ActiveRecordAbstractFactory::getActiveRecordFactory(ActiveRecordAbstractFactory::MYSQL);
$oMysql->conectar();

$oMysqlCliente = $oMysql->getClientesActiveRecord();
$oCliente = new ClientesValueObject();

mysql_query("BEGIN;");
$error = 0;
if ($_POST['accion'] == 'Eliminar') {
    $oCliente->set_idclientes($_POST['cliente']);
    if (!$oMysqlCliente->borrar($oCliente)) {
        $error = 5;
    }
} else {
    if ($_POST['accion'] == 'Actualizar') {
        $oCliente->set_idclientes($_POST['cliente']);
    }
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

    $apellido = strtoupper($apellido);
    $nombre = strtoupper($nombre);
    $condicionfiscal = strtoupper($condicionfiscal);
    $localidad = strtoupper($localidad);
    $barrio = strtoupper($barrio);
    $calle = strtoupper($calle);
    $correo = strtoupper($correo);
    
    /* Invierto la fecha de nacimiento */
    if(strpos($nacimiento, '/') !== false){
        $fecha = explode('/', $nacimiento);
        $nacimiento = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
    }
        
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

    if ($oMysqlCalle->existe($oCalle) > 0) {
        $oCallePrueba = $oMysqlCalle->buscarPorNombre($oCalle);
        $oCliente->set_idcalles($oCallePrueba->getIdcalles());
    } else {
        $oMysqlCalle->guardar($oCalle);
        $oCliente->set_idcalles($oCalle->getIdcalles());
    }
    /* Fin de buscar la calle. */

    /* Grabacion del cliente. */
    if ($_POST['accion'] == 'Guardar') {
        if (!$oMysqlCliente->guardar($oCliente)) {
            $error = 1;
        }
        /* Comienzo Almacenamiento de los telefonos. */
        $oMysqlTel = $oMysql->getTelefonosActiveRecord();
        $oTelefono = new TelefonosValueObject();
        if ($telefono != '') {
            $oTelefono->set_idclientes($oCliente->get_idclientes());
            $oTelefono->set_numero($telefono);
            if (!$oMysqlTel->guardar($oTelefono)) {
                echo 'leo';
                $error = 3;
            }
        }
        if ($celular != '') {
            $oTelefono->set_idclientes($oCliente->get_idclientes());
            $oTelefono->set_numero($celular);
            if (!$oMysqlTel->guardar($oTelefono)) {
                $error = 4;
            }
        }
        /* Fin Almacenamiento de los telefonos. */
    } else {
        if (!$oMysqlCliente->actualizar($oCliente)) {
            $error = 2;
        }
        /* Para actualizar el telefono y el celular, debo de buscar los registros del cliente
          y recorrerlo para obtener el id y poder actualizarlo.
         */

        $oMysqlTel = $oMysql->getTelefonosActiveRecord();
        $oTelefono = new TelefonosValueObject();
        $oTelefono->set_idclientes($oCliente->get_idclientes());
        $oTelefono = $oMysqlTel->buscarPorCliente($oTelefono);

        if (count($oTelefono) == 2) {
            $idFijo = $oTelefono[0]->get_idtelefonos();
            $idCelular = $oTelefono[1]->get_idtelefonos();
            unset($oTelefono);

            $oTelefono = new TelefonosValueObject();
            $oTelefono->set_idclientes($oCliente->get_idclientes());

            $oTelefono->set_numero($telefono);
            $oTelefono->set_idtelefonos($idFijo);
            if (!$oMysqlTel->actualizar($oTelefono)) {
                $error = 6;
            }
            $oTelefono->set_numero($celular);
            $oTelefono->set_idtelefonos($idCelular);
            if (!$oMysqlTel->actualizar($oTelefono)) {
                $error = 7;
            }
        } elseif (count($oTelefono) == 0) {
            $oMysqlTel = $oMysql->getTelefonosActiveRecord();
            $oTelefono = new TelefonosValueObject();
            if ($telefono != '') {
                $oTelefono->set_idclientes($oCliente->get_idclientes());
                $oTelefono->set_numero($telefono);
                if (!$oMysqlTel->guardar($oTelefono)) {
                    $error = 3;
                }
            }
            if ($celular != '') {
                $oTelefono->set_idclientes($oCliente->get_idclientes());
                $oTelefono->set_numero($celular);
                if (!$oMysqlTel->guardar($oTelefono)) {
                    $error = 4;
                }
            }
        } elseif (count($oTelefono) == 1) {
            $idFijo = $oTelefono[0]->get_idtelefonos();
            unset($oTelefono);

            $oTelefono = new TelefonosValueObject();
            $oTelefono->set_numero($telefono);
            $oTelefono->set_idtelefonos($idFijo);
            
            $oTelefono->set_idclientes($oCliente->get_idclientes());
            $oTelefono->set_numero($telefono);
            if (!$oMysqlTel->actualizar($oTelefono)) {
                $error = 6;
            }
            if ($celular != '') {
                $oTelefono->set_idclientes($oCliente->get_idclientes());
                $oTelefono->set_numero($celular);
                if (!$oMysqlTel->guardar($oTelefono)) {
                    $error = 4;
                }
            }
        }
    }
}

$error = 1;

if ($error == 0) {
    mysql_query("COMMIT;");
    ?>
    <div class="row has-success">
        <input type="text" value="Los Datos Se Grabaron Correctamente" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
} else {
    mysql_query("ROLLBACK;");
    ?>
    <div class="row has-error">
        <input type="text" value="Los Datos No Han Sido Almacenados. Error n° <?php echo $error; ?>" class="form-control">
        <span class="input-icon fui-check-inverted"></span>
    </div>
    <?php
}