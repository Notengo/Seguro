<?php

require_once 'activeRecordInterface.php';
//require_once '../ValueObject/ModelosValueObject.php';
require_once '../clases/ValueObject/ModelosValueObject.php';

/**
 * Description of MysqlModelosActiveRecord
 *
 * @author ssrolanr
 */
class MysqlModelosActiveRecord {

    /**
     * @param ModelosValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE modelos SET descripcion = '"
                . strtoupper($oValueObject->get_descripcion()) . "' "
                . "WHERE idmodelos = " . $oValueObject->get_idmodelos() . ";";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param ModelosValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM modelos WHERE idmodelos = " . $oValueObject->get_idmodelos() . ";";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param ModelosValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM modelos WHERE idmodelos = "
                . $oValueObject->get_idmodelos() . ";";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_idmarcas($fila->idmarcas);
            $oValueObject->set_descripcion($fila->descripcion);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param ModelosValueObject $oValueObject
     * @return boolean
     */
    public function buscarDescripcion($oValueObject) {
        $sql = "SELECT * FROM modelos WHERE descripcion = '"
                . $oValueObject->get_descripcion() . "';";
        $resultado = mysql_query($sql);

        $fila = mysql_fetch_object($resultado);
        if ($fila) {
//            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_idmarcas($fila->idmarcas);
            $oValueObject->set_idmodelos($fila->idmodelos);
            return $oValueObject;
        } else {
            $sql = "INSERT INTO modelos (idmarcas, descripcion) VALUES ("
                    . $oValueObject->get_idmarcas() . ", '"
                    . strtoupper($oValueObject->get_descripcion()) . "');";
            if (mysql_query($sql)) {
                $sql = "SELECT * FROM modelos WHERE descripcion = '"
                        . $oValueObject->get_descripcion() . "' AND idmarcas = " . $oValueObject->get_idmarcas() . ";";

//                $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM modelos");
                $result = mysql_query($sql);
                $id = mysql_fetch_array($result);
                if ($id[0] != 0) {
                    $oValueObject->set_idmodelos($id[0]);
                }
                return $oValueObject;
            } else {
                return FALSE;
            }
        }
    }

    /**
     * 
     * @param ModelosValueObject $oValueObject
     * @return boolean
     */
    public function buscarPorMarca($oValueObject) {
        $sql = "SELECT * FROM modelos WHERE idmarcas = "
                . $oValueObject->get_idmarcas() . ";";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $aModelos = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new ModelosValueObject();
                $oValueObject->set_idmodelos($fila->idmodelos);
                $oValueObject->set_idmarcas($fila->idmarcas);
                $oValueObject->set_descripcion($fila->descripcion);
                $aModelos[] = $oValueObject;
                unset($oValueObject);
            }
            return $aModelos;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return boolean|\CallesValueObject
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM modelos;";
        $resultado = mysql_query($sql) or die(false);
        $aModelos = array();
        if ($resultado) {
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new ModelosValueObject();
                $oValueObject->set_idmodelos($fila->idmodelos);
                $oValueObject->set_idmarcas($fila->idmarcas);
                $oValueObject->set_descripcion($fila->descripcion);
                $aModelos[] = $oValueObject;
                unset($oValueObject);
            }
            return $aModelos;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM modelos;";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_array($resultado);
        if ($resultado[0] > 0) {
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * 
     * @param ModelosValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM modelos WHERE descripcion = '" . $oValueObject->get_descripcion() . "';";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_array($resultado);
        if ($resultado[0] > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param ModelosValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO modelos (idmarcas, descripcion) VALUES ("
                . $oValueObject->get_idmarcas() . ", '"
                . strtoupper($oValueObject->get_descripcion()) . "');";
        if (mysql_query($sql) or die(false)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM modelos");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {
                $oValueObject->set_idmodelos($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
