<?php
include_once 'activeRecordInterface.php';
//include_once '../ValueObject/CondfiscalesValueObject.php';
include_once '../clases/ValueObject/CondfiscalesValueObject.php';
/**
 * Description of MysqlCondfiscalesActiveRecord
 *
 * @author Martin
 */
class MysqlCondfiscalesActiveRecord implements ActiveRecord{
    /**
     * 
     * @param CondfiscalesValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE condfiscales SET descripcion = '"
                . $oValueObject->get_descripcion() ."' "
                . "WHERE idcondfiscales = "
                . $oValueObject->get_idcondfiscales() . ";";
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
     * @param CondfiscalesValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM condfiscales WHERE idcondfiscales = "
                . $oValueObject->get_idcondfiscales() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_descripcion($fila->descripcion);
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM condfiscales;";
        $resultado = mysql_query($sql) or die(false);
        $aCondFiscal = array();
        if($resultado){
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new CondfiscalesValueObject();
                $oValueObject->set_idcondfiscales($fila->idcondfiscales);
                $oValueObject->set_descripcion($fila->descripcion);
                $aCondFiscal[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCondFiscal;
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
     * @param CondfiscalesValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO condfiscales (descripcion) VALUES ('"
                . $oValueObject->get_descripcion() ."');";
        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}