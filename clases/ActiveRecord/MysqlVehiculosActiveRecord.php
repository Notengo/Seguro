<?php

include_once 'ActiveRecordAbstractFactory.php';
//include_once '../ValueObject/VehiculosValueObject.php';
include_once '../clases/ValueObject/VehiculosValueObject.php';

/**
 * Description of ClientesActiveRecord
 *
 * @author ssrolanr
 */
class MysqlVehiculosActiveRecord implements ActiveRecord {

    /**
     * 
     * @param VehiculosValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE vehiculos SET "
                . "idclientes = " . $oValueObject->get_idclientes()
                . ", patente = '" . strtoupper($oValueObject->get_patente()) . "'"
                . ", motor = '" . $oValueObject->get_motor() . "'"
                . ", chacis = '" . $oValueObject->get_chacis() . "'"
                . ", fechafabricacion = '" . $oValueObject->get_fechafabricacion() . "'"
                . ", idmarcas = ";
        if ($oValueObject->get_idmarcas() != '') {
            $sql .= $oValueObject->get_idmarcas();
        } else {
            $sql .= "''";
        }
        $sql .= ", idmodelos = ";
        if ($oValueObject->get_idmodelos() != '') {
            $sql .= $oValueObject->get_idmodelos();
        } else {
            $sql .= "''";
        }
        $sql .= ", version = '" . $oValueObject->get_version() . "'"
                . ", idtipos = ";
        if ($oValueObject->get_idtipos() != '') {
            $sql .= $oValueObject->get_idtipos();
        } else {
            $sql .= "''";
        }
        $sql .= ", idusos = ";
        if ($oValueObject->get_idusos() != '') {
            $sql .= $oValueObject->get_idusos();
        } else {
            $sql .="''";
        }
        $sql .= ", naftero = '" . $oValueObject->get_naftero() . "'"
                . ", valorasegurado = '" . $oValueObject->get_valorasegurado() . "'"
                . " WHERE idvehiculos = " . $oValueObject->get_idvehiculos() . ";";

        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function borrar($oValueObject) {
        $sql = "UPDATE vehiculos SET baja = DATE_FORMAT(NOW(), '%Y-%m-%d')"
                . " WHERE idclientes = " . $oValueObject->get_idclientes() . ";";

        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param VehiculosValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM vehiculos WHERE ";
        if ($oValueObject->get_idclientes() != '') {
            $sql .= "idclientes = " . $oValueObject->get_idclientes() . ";";
        } elseif ($oValueObject->get_idvehiculos() != '') {
            $sql .= "idvehiculos = " . $oValueObject->get_idvehiculos() . ";";
        }
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_idvehiculos($fila->idvehiculos);
            $oValueObject->set_idclientes($fila->idclientes);
            $oValueObject->set_patente($fila->patente);
            $oValueObject->set_motor($fila->motor);
            $oValueObject->set_chacis($fila->chacis);
            $oValueObject->set_fechafabricacion($fila->fechafabricacion);
            $oValueObject->set_idmarcas($fila->idmarcas);
            $oValueObject->set_idmodelos($fila->idmodelos);
            $oValueObject->set_version($fila->version);
            $oValueObject->set_idtipos($fila->idtipos);
            $oValueObject->set_idusos($fila->idusos);
            $oValueObject->set_naftero($fila->naftero);
            $oValueObject->set_valorasegurado($fila->valorasegurado);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param VehiculosValueObject $oValueObject
     * @return boolean
     */
    public function buscarPatente($oValueObject) {
        $sql = "SELECT * FROM vehiculos WHERE "
                . "patente = '" . $oValueObject->get_patente() . "';";
        $resultado = mysql_query($sql);
        $fila = mysql_fetch_object($resultado);
        if ($fila) {
            $oValueObject->set_idvehiculos($fila->idvehiculos);
            $oValueObject->set_idclientes($fila->idclientes);
            $oValueObject->set_patente($fila->patente);
            $oValueObject->set_motor($fila->motor);
            $oValueObject->set_chacis($fila->chacis);
            $oValueObject->set_fechafabricacion($fila->fechafabricacion);
            $oValueObject->set_idmarcas($fila->idmarcas);
            $oValueObject->set_idmodelos($fila->idmodelos);
            $oValueObject->set_version($fila->version);
            $oValueObject->set_idtipos($fila->idtipos);
            $oValueObject->set_idusos($fila->idusos);
            $oValueObject->set_naftero($fila->naftero);
            $oValueObject->set_valorasegurado($fila->valorasegurado);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param VehiculosValueObject $oValueObject
     * @return boolean
     */
    public function filtro($oValueObject) {
        $sql = "SELECT * FROM vehiculos WHERE idclientes = " . $oValueObject->get_idclientes() . ";";

        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $aVehiculo = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new VehiculosValueObject();
                $oValueObject->set_idvehiculos($fila->idvehiculos);
                $oValueObject->set_idclientes($fila->idclientes);
                $oValueObject->set_patente($fila->patente);
                $oValueObject->set_motor($fila->motor);
                $oValueObject->set_chacis($fila->chacis);
                $oValueObject->set_fechafabricacion($fila->fechafabricacion);
                $oValueObject->set_idmarcas($fila->idmarcas);
                $oValueObject->set_idmodelos($fila->idmodelos);
                $oValueObject->set_version($fila->version);
                $oValueObject->set_idtipos($fila->idtipos);
                $oValueObject->set_idusos($fila->idusos);
                $oValueObject->set_naftero($fila->naftero);
                $oValueObject->set_valorasegurado($fila->valorasegurado);
                $aVehiculo[] = $oValueObject;
                unset($oValueObject);
            }
            return $aVehiculo;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param VehiculosValueObject $oValueObject
     * @return boolean
     */
    public function filtroPatente($oValueObject) {
        $sql = "SELECT * FROM vehiculos WHERE patente like '%" . $oValueObject->get_patente() . "%'";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $aVehiculo = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new VehiculosValueObject();
                $oValueObject->set_idvehiculos($fila->idvehiculos);
                $oValueObject->set_idclientes($fila->idclientes);
                $oValueObject->set_patente($fila->patente);
                $oValueObject->set_motor($fila->motor);
                $oValueObject->set_chacis($fila->chacis);
                $oValueObject->set_fechafabricacion($fila->fechafabricacion);
                $oValueObject->set_idmarcas($fila->idmarcas);
                $oValueObject->set_idmodelos($fila->idmodelos);
                $oValueObject->set_version($fila->version);
                $oValueObject->set_idtipos($fila->idtipos);
                $oValueObject->set_idusos($fila->idusos);
                $oValueObject->set_naftero($fila->naftero);
                $oValueObject->set_valorasegurado($fila->valorasegurado);
                $aVehiculo[] = $oValueObject;
                unset($oValueObject);
            }
            return $aVehiculo;
        } else {
            return FALSE;
        }
    }

    public function buscarTodo() {
//        $sql = "SELECT * FROM vehiculos WHERE baja IS NULL OR baja = '0000-00-00';" ;
        $sql = "SELECT idvehiculos, idclientes, patente, motor, chacis, "
                . "fechafabricacion, idmarcas, idmodelos, version, idtipos, idusos, "
                . "naftero, valorasegurado FROM vehiculos;";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $aVehiculo = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new VehiculosValueObject();
                $oValueObject->set_idvehiculos($fila->idvehiculos);
                $oValueObject->set_idclientes($fila->idclientes);
                $oValueObject->set_patente($fila->patente);
                $oValueObject->set_motor($fila->motor);
                $oValueObject->set_chacis($fila->chacis);
                $oValueObject->set_fechafabricacion($fila->fechafabricacion);
                $oValueObject->set_idmarcas($fila->idmarcas);
                $oValueObject->set_idmodelos($fila->idmodelos);
                $oValueObject->set_version($fila->version);
                $oValueObject->set_idtipos($fila->idtipos);
                $oValueObject->set_idusos($fila->idusos);
                $oValueObject->set_naftero($fila->naftero);
                $oValueObject->set_valorasegurado($fila->valorasegurado);
                $aVehiculo[] = $oValueObject;
                unset($oValueObject);
            }
            return $aVehiculo;
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
     * @param VehiculosValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO vehiculos (idclientes, patente, motor, chacis, "
                . "fechafabricacion, idmarcas, idmodelos, version, idtipos, idusos, "
                . "naftero, valorasegurado) "
                . "VALUES ("
                . $oValueObject->get_idclientes() . ", '"
                . strtoupper($oValueObject->get_patente()) . "', '"
                . strtoupper($oValueObject->get_motor()) . "', '"
                . strtoupper($oValueObject->get_chacis()) . "', '"
                . $oValueObject->get_fechafabricacion() . "', ";

        if ($oValueObject->get_idmarcas()) {
            $sql .= $oValueObject->get_idmarcas();
        } else {
            $sql .= "''";
        }
        $sql.= ", ";
        if ($oValueObject->get_idmodelos()) {
            $sql .= $oValueObject->get_idmodelos();
        } else {
            $sql .= "''";
        }
        $sql.= ", '"
                . strtoupper($oValueObject->get_version()) . "', ";
        if ($oValueObject->get_idtipos() != '') {
            $sql .= $oValueObject->get_idtipos();
        } else {
            $sql .= "''";
        }
        if ($oValueObject->get_idusos() != '') {
            $sql .= ", " . $oValueObject->get_idusos();
        } else {
            $sql .= ", ''";
        }
        $sql .= ", '" . $oValueObject->get_naftero() . "', '"
                . $oValueObject->get_valorasegurado() . "');";

        if (mysql_query($sql)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM vehiculos");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {
                $oValueObject->set_idvehiculos($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
