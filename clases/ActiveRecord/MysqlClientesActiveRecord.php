<?php

include_once 'ActiveRecordAbstractFactory.php';
//include_once '../ValueObject/ClientesValueObject.php';
include_once '../clases/ValueObject/ClientesValueObject.php';

/**
 * Description of ClientesActiveRecord
 *
 * @author ssrolanr
 */
class MysqlClientesActiveRecord implements ActiveRecord {

    /**
     * 
     * @param ClientesValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE clientes SET apellido = '" . $oValueObject->get_apellido()
                . "', nombre = '" . $oValueObject->get_nombre() . "'";

        if ($oValueObject->get_idtipodocumentos() != '') {
            $sql .= ", idtipodocumentos = " . $oValueObject->get_idtipodocumentos();
        }

        if ($oValueObject->get_documento() != '') {
            $sql .= ", documento = " . $oValueObject->get_documento();
        }

        if ($oValueObject->get_idcondfiscales() != '') {
            $sql .= ", idcondfiscales = " . $oValueObject->get_idcondfiscales();
        }

        $sql .= ", cc = '" . $oValueObject->get_cc() . "'";

        if ($oValueObject->get_idcalles() != '') {
            $sql .= ", idcalles = " . $oValueObject->get_idcalles();
        }

        if ($oValueObject->get_altura() != '') {
            $sql .= ", altura = " . $oValueObject->get_altura();
        }

        if ($oValueObject->get_piso()) {
            $sql .= ", piso = " . $oValueObject->get_piso();
        }

        $sql .= ", dpto = '" . $oValueObject->get_dpto() . "'";

        if ($oValueObject->get_idbarrios()) {
            $sql .= ", idbarrios = " . $oValueObject->get_idbarrios();
        }
        
        if ($oValueObject->get_idlocalidad()) {
            $sql .= ", idlocalidad = " . $oValueObject->get_idlocalidad();
        }

        $sql .= ", cp = '" . $oValueObject->get_cp()
                . "', email = '" . $oValueObject->get_email()
                . "', fechanacimiento = '" . $oValueObject->get_fechanacimiento()
                . "' WHERE idclientes = " . $oValueObject->get_idclientes() . ";";

        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function borrar($oValueObject) {
        $sql = "UPDATE clientes SET baja = DATE_FORMAT(NOW(), '%Y-%m-%d')"
                . " WHERE idclientes = " . $oValueObject->get_idclientes() . ";";
        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param ClientesValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM clientes WHERE ";
        if ($oValueObject->get_idclientes() != '') {
            $sql .= "idclientes = " . $oValueObject->get_idclientes() . ";";
        } elseif ($oValueObject->get_documento() != '') {
            $sql .= "documento = " . $oValueObject->get_documento() . ";";
        } elseif ($oValueObject->get_apellido() != '') {
            $sql .= "apellido = " . $oValueObject->get_apellido() . ";";
        } elseif ($oValueObject->get_nombre() != '') {
            $sql .= "nombre = " . $oValueObject->get_nombre() . ";";
        }
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_altura($fila->altura);
            $oValueObject->set_apellido($fila->apellido);
            $oValueObject->set_cc($fila->cc);
            $oValueObject->set_cp($fila->cp);
            $oValueObject->set_documento($fila->documento);
            $oValueObject->set_dpto($fila->dpto);
            $oValueObject->set_email($fila->email);
            $oValueObject->set_fechanacimiento($fila->fechanacimiento);
            $oValueObject->set_idbarrios($fila->idbarrios);
            $oValueObject->set_idcalles($fila->idcalles);
            $oValueObject->set_idclientes($fila->idclientes);
            $oValueObject->set_idcondfiscales($fila->idcondfiscales);
            $oValueObject->set_idlocalidad($fila->idlocalidad);
            $oValueObject->set_idtipodocumentos($fila->idtipodocumentos);
            $oValueObject->set_nombre($fila->nombre);
            $oValueObject->set_piso($fila->piso);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    public function buscarTodo() {
//        $sql = "SELECT * FROM clientes WHERE idclientes = " . $oValueObject->get_idclientes() . ";" ;
//        $sql = "SELECT * FROM clientes WHERE baja IS NULL OR baja = '0000-00-00';";
        $sql = "SELECT * FROM clientes WHERE baja IS NULL OR baja = '0000-00-00' ORDER BY idclientes DESC;";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $aClientes = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new ClientesValueObject();
                $oValueObject->set_altura($fila->altura);
                $oValueObject->set_apellido($fila->apellido);
                $oValueObject->set_cc($fila->cc);
                $oValueObject->set_cp($fila->cp);
                $oValueObject->set_documento($fila->documento);
                $oValueObject->set_dpto($fila->dpto);
                $oValueObject->set_email($fila->email);
                $oValueObject->set_fechanacimiento($fila->fechanacimiento);
                $oValueObject->set_idbarrios($fila->idbarrios);
                $oValueObject->set_idcalles($fila->idcalles);
                $oValueObject->set_idclientes($fila->idclientes);
                $oValueObject->set_idcondfiscales($fila->idcondfiscales);
                $oValueObject->set_idlocalidad($fila->idlocalidad);
                $oValueObject->set_idtipodocumentos($fila->idtipodocumentos);
                $oValueObject->set_nombre($fila->nombre);
                $oValueObject->set_piso($fila->piso);
                $aClientes[] = $oValueObject;
                unset($oValueObject);
            }
            return $aClientes;
        } else {
            return FALSE;
        }
    }

    public function buscarCompleto() {
        $sql = "SELECT * FROM clientes;";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $aClientes = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new ClientesValueObject();
                $oValueObject->set_altura($fila->altura);
                $oValueObject->set_apellido($fila->apellido);
                $oValueObject->set_cc($fila->cc);
                $oValueObject->set_cp($fila->cp);
                $oValueObject->set_documento($fila->documento);
                $oValueObject->set_dpto($fila->dpto);
                $oValueObject->set_email($fila->email);
                $oValueObject->set_fechanacimiento($fila->fechanacimiento);
                $oValueObject->set_idbarrios($fila->idbarrios);
                $oValueObject->set_idcalles($fila->idcalles);
                $oValueObject->set_idclientes($fila->idclientes);
                $oValueObject->set_idcondfiscales($fila->idcondfiscales);
                $oValueObject->set_idlocalidad($fila->idlocalidad);
                $oValueObject->set_idtipodocumentos($fila->idtipodocumentos);
                $oValueObject->set_nombre($fila->nombre);
                $oValueObject->set_piso($fila->piso);
                $aClientes[] = $oValueObject;
                unset($oValueObject);
            }
            return $aClientes;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param ClientesValueObject $oValueObject
     * @return boolean
     */
    public function filtro($oValueObject) {
        $sql = "SELECT * FROM clientes WHERE (baja IS NULL OR baja = '0000-00-00') AND (";
        $sql .= "documento LIKE '%" . $oValueObject->get_documento() . "%' ";
        $sql .= "OR apellido LIKE '%" . $oValueObject->get_apellido() . "%' ";
        $sql .= "OR nombre LIKE '%" . $oValueObject->get_nombre() . "%')"
                . " ORDER BY idclientes DESC;";

        $resultado = mysql_query($sql) or die('false');
        if ($resultado) {
            $aClientes = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new ClientesValueObject();
                $oValueObject->set_altura($fila->altura);
                $oValueObject->set_apellido($fila->apellido);
                $oValueObject->set_cc($fila->cc);
                $oValueObject->set_cp($fila->cp);
                $oValueObject->set_documento($fila->documento);
                $oValueObject->set_dpto($fila->dpto);
                $oValueObject->set_email($fila->email);
                $oValueObject->set_fechanacimiento($fila->fechanacimiento);
                $oValueObject->set_idbarrios($fila->idbarrios);
                $oValueObject->set_idcalles($fila->idcalles);
                $oValueObject->set_idclientes($fila->idclientes);
                $oValueObject->set_idcondfiscales($fila->idcondfiscales);
                $oValueObject->set_idlocalidad($fila->idlocalidad);
                $oValueObject->set_idtipodocumentos($fila->idtipodocumentos);
                $oValueObject->set_nombre($fila->nombre);
                $oValueObject->set_piso($fila->piso);
                $aClientes[] = $oValueObject;
                unset($oValueObject);
            }
            return $aClientes;
        } else {
            return FALSE;
        }
    }

    public function contar() {
        
    }

    public function existe($oValueObject) {
        
    }

    /**
     * 
     * @param ClientesValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO clientes (apellido, nombre, idtipodocumentos, "
                . "documento, idcondfiscales, cc, idcalles, altura, piso, "
                . "dpto, idbarrios, idlocalidad, cp, email, fechanacimiento) "
                . "VALUES ('"
                . $oValueObject->get_apellido() . "', '" . $oValueObject->get_nombre() . "', ";

        if ($oValueObject->get_idtipodocumentos() != '') {
            $sql .= $oValueObject->get_idtipodocumentos() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_documento() != '') {
            $sql .= $oValueObject->get_documento() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_idcondfiscales() != '') {
            $sql .= $oValueObject->get_idcondfiscales() . ", '";
        } else {
            $sql .= "NULL, '";
        }
        $sql .= $oValueObject->get_cc() . "', ";
        if ($oValueObject->get_idcalles() != '') {
            $sql .= $oValueObject->get_idcalles() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_altura() != '') {
            $sql .= $oValueObject->get_altura() . ', ';
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_piso()) {
            $sql .= $oValueObject->get_piso() . ", '";
        } else {
            $sql .= "NULL, '";
        }
        $sql .= $oValueObject->get_dpto() . "', ";
        if ($oValueObject->get_idbarrios()) {
            $sql .= $oValueObject->get_idbarrios() . ", '";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_idlocalidad()) {
            $sql .= $oValueObject->get_idlocalidad() . ", '";
        } else {
            $sql .= "NULL, '";
        }
        $sql .= $oValueObject->get_cp() . "', '" . $oValueObject->get_email() . "', '"
                . $oValueObject->get_fechanacimiento() . "');";

        if (mysql_query($sql)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM clientes");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {
                $oValueObject->set_idclientes($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
