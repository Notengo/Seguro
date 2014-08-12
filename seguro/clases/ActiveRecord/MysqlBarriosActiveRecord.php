<?php
include_once 'activeRecordInterface.php';
//include_once '../ValueObject/BarriosValueObject.php';
include_once '../clases/ValueObject/BarriosValueObject.php';
/**
 * Description of MysqlBarriosActiveRecord
 *
 * @author Martin
 */
class MysqlBarriosActiveRecord implements ActiveRecord{
    public function actualizar($oValueObject) {
        $sql = "UPDATE barrios SET nombre = '"
                . $oValueObject->get_nombre() ."' "
                . "WHERE idbarrios = "
                . $oValueObject->get_idbarrios() . ";";
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
     * @param BarriosValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM barrios WHERE idbarrios = "
                . $oValueObject->get_idbarrios() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_nombre($fila->nombre);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param BarriosValueObject $oValueObject
     * @return boolean
     */
    public function buscarPorNombre($oValueObject) {
        $sql = "SELECT * FROM barrios WHERE "
            . "(nombre LIKE '%" . $oValueObject->get_nombre() . "%'); ";
//            . "OR idbarrios LIKE '%" . $oValueObject->get_idbarrios() . "%');";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new BarriosValueObject();
                $oValueObject->set_idbarrios($fila->idbarrios);
                $oValueObject->set_nombre($fila->nombre);
                $aBarrios[] = $oValueObject;
                unset($oValueObject);
            }
            return $aBarrios;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM barrios;";
        $resultado = mysql_query($sql) or die(false);
        $aBarrios = array();
        if($resultado){
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new BarriosValueObject();
                $oValueObject->set_idbarrios($fila->idbarrios);
                $oValueObject->set_nombre($fila->nombre);
                $aBarrios[] = $oValueObject;
                unset($oValueObject);
            }
            return $aBarrios;
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
     * @param BarriosValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO barrios (nombre) VALUES ('"
                . $oValueObject->get_nombre() ."');";
        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}