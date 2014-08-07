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
    /**
     * 
     * @param CallesValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE calles SET nombre = '"
                . $oValueObject->getNombre() ."' "
                . "WHERE idcalles = "
                . $oValueObject->getIdcalles() . ";";
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
                . $oValueObject->getIdcalles() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setNombre($fila->nombre);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }
    
    /**
     * Busca el id de la calle, se necesita que se le pase el nombre de la calle.
     * @param CallesValueObject $oValueObject
     * @return boolean
     */
    public function buscarPorNombre($oValueObject) {
        $sql = "SELECT * FROM calles WHERE nombre = '"
                . $oValueObject->getNombre() . "';";
//        echo $sql;
//        $resultado = mysql_query($sql) or die(false);
        $resultado = mysql_query($sql);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->setNombre($fila->nombre);
            $oValueObject->setIdcalles($fila->idcalles);
            return $oValueObject;
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
                $oValueObject->setIdcalles($fila->idcalles);
                $oValueObject->setNombre($fila->nombre);
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
    
    /**
     * 
     * @param CallesValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM calles WHERE nombre = '" . $oValueObject->getNombre() . "';";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_array($resultado);
        if($resultado[0] > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param CallesValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO calles (nombre) VALUES ('" . $oValueObject->getNombre() ."');";
        if (mysql_query($sql) or die(false)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM calles");
            $id = mysql_fetch_array($result);
            if($id[0]<>0) {
                $oValueObject->setIdcalles($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }
}