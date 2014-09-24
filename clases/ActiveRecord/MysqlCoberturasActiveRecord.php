<?php

require_once '../clases/ValueObject/CoberturasValueObject.php';
require_once 'ActiveRecordAbstractFactory.php';

/**
 * Description of MysqlCoberturasActiveRecord
 *
 * @author Escritorio
 */
class MysqlCoberturasActiveRecord implements ActiveRecord {

    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    public function buscar($oValueObject) {
        
    }

    /**
     * 
     * @return boolean|\CoberturasValueObject
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM coberturas;";
        $resultado = mysql_query($sql) or die(false);
        $aCobertura = array();
        if($resultado){
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new CoberturasValueObject();
                $oValueObject->set_idcoberturas($fila->idcoberturas) ;
                $oValueObject->set_nombre($fila->nombre) ;
                $oValueObject->set_codigo($fila->codigo) ;
                $oValueObject->set_descripcion($fila->descripcion) ;
                $aCobertura[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCobertura;
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
     * @param CoberturasValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO coberturas (nombre, codigo, descripcion) VALUES("
                . "'" . $oValueObject->get_nombre() . "', "
                . "'" . $oValueObject->get_codigo() . "', "
                . "'" . $oValueObject->get_descripcion() . "')";
        if (mysql_query($sql)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM coberturas;");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {
                $oValueObject->set_idcoberturas($id[0]);
            }
            return true;
        } else {
            return false;
            ;
        }
    }

}
