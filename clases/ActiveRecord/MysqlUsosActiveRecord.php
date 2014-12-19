<?php
require_once 'activeRecordInterface.php';
//require_once '../ValueObject/MarcasValueObject.php';
require_once '../clases/ValueObject/UsosValueObject.php';
/**
 * Description of MysqlUsosActiveRecord
 *
 * @author ssrolanr
 */
class MysqlUsosActiveRecord implements ActiveRecord {
    /**
     * 
     * @param UsosValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE usos SET descripcion = '"
                . strtoupper($oValueObject->get_descripcion()) . "' "
                . "WHERE idusos = " . $oValueObject->get_idusos() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param UsosValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM usos WHERE idusos = " . $oValueObject->get_idusos() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param UsosValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM usos WHERE idusos = "
                . $oValueObject->get_idusos() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_descripcion($fila->descripcion);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return \UsosValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM usos;";
        $resultado = mysql_query($sql) or die(false);
        $aUsos = array();
        if($resultado){
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new UsosValueObject();
                $oValueObject->set_idusos($fila->idusos);
                $oValueObject->set_descripcion($fila->descripcion);
                $aUsos[] = $oValueObject;
                unset($oValueObject);
            }
            return $aUsos;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM usos;";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_array($resultado);
        if($resultado[0] > 0){
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * 
     * @param UsosValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM usos WHERE descripcion = '" . $oValueObject->get_descripcion() . "';";
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
     * @param UsosValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO usos (descripcion) VALUES ('"
                . strtoupper($oValueObject->get_descripcion()) . "');";
        if (mysql_query($sql) or die(false)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM usos");
            $id = mysql_fetch_array($result);
            if($id[0]<>0) {
                $oValueObject->set_idusos($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }
}