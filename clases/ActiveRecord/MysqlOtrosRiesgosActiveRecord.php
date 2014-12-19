<?php

require_once 'activeRecordInterface.php';
require_once '../clases/ValueObject/OtrosRiesgosValueObject.php';

/**
 * Description of MysqlOtrosRiesgosActiveRecord
 *
 * @author Escritorio
 */
class MysqlOtrosRiesgosActiveRecord implements ActiveRecord {

    
     /**
     * 
     * @param OtrosRiesgosValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql="UPDATE otrosriesgos SET nombre='".$oValueObject->get_nombre()."',"
                . "descripcion='".$oValueObject->get_descripcion()."' "
                . "where idotrosriesgos=".$oValueObject->get_idotrosriesgos()."";
        if(mysql_query($sql) or die (false))
        {
            return true;
        }else{return false;}
        
    }
   /**
     * 
     * @param OtrosRiesgosValueObject $oValueObject
     * @return boolean
     */

    public function borrar($oValueObject) {
        $sql="DELETE FROM otrosriesgos WHERE idotrosriesgos=".$oValueObject->get_idotrosriesgos()."";
        if(mysql_query($sql)or die(FALSE))
        {
           return true; 
        }else {return false; }
        
    }

    public function buscar($oValueObject) {
        
    }

    /**
     * 
     * @return boolean|\OtrosRiesgosValueObject
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM `otrosriesgos`;";
        $resultado = mysql_query($sql) or die(false);
        $aORiesgo = array();
        if ($resultado) {
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new OtrosRiesgosValueObject();
                $oValueObject->set_idotrosriesgos($fila->idotrosriesgos);
                $oValueObject->set_nombre($fila->nombre);
                $oValueObject->set_descripcion($fila->descripcion);
                $aORiesgo[] = $oValueObject;
                unset($oValueObject);
            }
            return $aORiesgo;
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
     * @param OtrosRiesgosValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO otrosriesgos (nombre, descripcion) VALUES("
                . "'" . $oValueObject->get_nombre() . "', "
                . "'" . strtoupper($oValueObject->get_descripcion()) . "')";
        if (mysql_query($sql)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM otrosriesgos;");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {
                $oValueObject->set_idotrosriesgos($id[0]);
            }
            return true;
        } else {
            return false;
        }
    }

}
