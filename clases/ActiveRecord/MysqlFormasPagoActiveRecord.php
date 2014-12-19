<?php

include_once 'activeRecordInterface.php';
//include_once '../ValueObject/CondfiscalesValueObject.php';
include_once '../clases/ValueObject/FormasPagoValueObject.php';

/**
 * Description of MysqlFormasPagoActiveRecord
 *
 * @author Martin
 */
class MysqlFormasPagoActiveRecord implements ActiveRecord {

    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param FormasPagoValueObject $oValueObject
     * @return boolean|\FormasPagoValueObject
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM formaspago "
                . "WHERE idformaspago = " . $oValueObject->get_idformaspago() . ";";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_idformaspago($fila->idformaspago);
            $oValueObject->set_descripcion($fila->descripcion);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return boolean|\FormasPagoValueObject
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM formaspago;";
        $resultado = mysql_query($sql) or die(false);
        $aFP = array();
        if ($resultado) {
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new FormasPagoValueObject();
                $oValueObject->set_idformaspago($fila->idformaspago);
                $oValueObject->set_descripcion($fila->descripcion);
                $aFP[] = $oValueObject;
                unset($oValueObject);
            }
            return $aFP;
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
     * @param FormasPagoValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO formaspago (descripcion) VALUES('" . $oValueObject->get_descripcion() . "')";
        if (mysql_query($sql)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM formaspago;");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {
                $oValueObject->set_idformaspago($id[0]);
            }
            return true;
        } else {
            return false;
            ;
        }
    }

}
