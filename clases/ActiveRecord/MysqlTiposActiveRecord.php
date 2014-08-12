<?php
require_once 'activeRecordInterface.php';
//require_once '../ValueObject/MarcasValueObject.php';
require_once '../clases/ValueObject/TiposValueObject.php';
/**
 * Description of MysqlUsosActiveRecord
 *
 * @author Martin
 */
class MysqlTiposActiveRecord implements ActiveRecord {
    /**
     * 
     * @param TiposValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE tipos SET descripcion = '"
                . $oValueObject->get_descripcion() . "' "
                . "WHERE idtipos = " . $oValueObject->get_idtipos() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param TiposValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM tipos WHERE idtipos = " . $oValueObject->get_idtipos() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param TiposValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM tipos WHERE idtipos = "
                . $oValueObject->get_idtipos() . ";";
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
     * @return \TiposValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM tipos;";
        $resultado = mysql_query($sql) or die(false);
        $aUsos = array();
        if($resultado){
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new TiposValueObject();
                $oValueObject->set_idtipos($fila->idtipos);
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
        $sql = "SELECT COUNT(*) FROM tipos;";
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
     * @param TiposValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM tipos WHERE descripcion = '" . $oValueObject->get_descripcion() . "';";
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
     * @param TiposValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO tipos (descripcion) VALUES ('"
                . $oValueObject->get_descripcion() . "');";
        if (mysql_query($sql) or die(false)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM tipos");
            $id = mysql_fetch_array($result);
            if($id[0]<>0) {
                $oValueObject->set_idtipos($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }
}