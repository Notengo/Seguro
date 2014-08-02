<?php
include_once 'activeRecordInterface.php';
//include_once '../ValueObject/CallesValueObject.php';
include_once '../clases/ValueObject/CallesValueObject.php';
/**
 * Description of MysqlCallesActiveRecord
 *
 * @author Martin
 */
class MysqlCallesActiveRecord implements ActiveRecord{
    public function actualizar($oValueObject) {
        $sql = "UPDATE calles SET nombre = '"
                . $oValueObject->get_nombre() ."' "
                . "WHERE idcalles = "
                . $oValueObject->get_idcalles() . ";";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param CallesValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM calles WHERE idcalles = "
                . $oValueObject->get_idcalles() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_nombre($fila->nombre);
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM calles;";
        $resultado = mysql_query($sql) or die(false);
        $aCalles = array();
        if($resultado){
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new CallesValueObject();
                $oValueObject->set_idcalles($fila->idcalles);
                $oValueObject->set_nombre($fila->nombre);
                $aCalles[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCalles;
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
     * @param CallesValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO calles (nombre) VALUES ('"
                . $oValueObject->get_nombre() ."');";
        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}