<?php
require_once 'activeRecordInterface.php';
//require_once '../ValueObject/MarcasValueObject.php';
require_once '../clases/ValueObject/MarcasValueObject.php';
/**
 * Description of MysqlMarcasActiveRecord
 *
 * @author ssrolanr
 */
class MysqlMarcasActiveRecord implements ActiveRecord{

    /**
     * @param MarcasValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE marcas SET descripcion = '"
                . $oValueObject->get_descripcion() . "' "
                . "WHERE idmarcas = " . $oValueObject->get_idmarcas() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param MarcasValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM marcas WHERE idmarcas = " . $oValueObject->get_idmarcas() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param MarcasValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM marcas WHERE idmarcas = "
                . $oValueObject->get_idmarcas() . ";";
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
     * @return boolean|\CallesValueObject
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM marcas;";
        $resultado = mysql_query($sql) or die(false);
        $aMarcas = array();
        if($resultado){
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new MarcasValueObject();
                $oValueObject->set_idmarcas($fila->idmarcas);
                $oValueObject->set_descripcion($fila->descripcion);
                $aMarcas[] = $oValueObject;
                unset($oValueObject);
            }
            return $aMarcas;
        } else {
            return FALSE;
        }
    }
    
    /**
     * 
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM marcas;";
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
     * @param MarcasValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM marcas WHERE descripcion = '" . $oValueObject->get_descripcion() . "';";
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
     * @param MarcasValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO marcas (descripcion) VALUES ('"
                . $oValueObject->get_descripcion() . "');";
        if (mysql_query($sql) or die(false)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM marcas");
            $id = mysql_fetch_array($result);
            if($id[0]<>0) {
                $oValueObject->set_idmarcas($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
