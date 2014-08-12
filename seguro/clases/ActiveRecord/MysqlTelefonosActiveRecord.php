<?php
include_once 'ActiveRecordAbstractFactory.php';
//include_once '../ValueObject/TelefonosValueObject.php';
include_once '../clases/ValueObject/TelefonosValueObject.php';
/**
 * Description of MysqlTelefonosActiveRecord
 *
 * @author Martin
 */
class MysqlTelefonosActiveRecord implements ActiveRecord{
    /**
     * @param TelefonosValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE telefonos SET idclientes = " . $oValueObject->get_idclientes()
                . ", numero = '" . $oValueObject->get_numero() . "' "
                . "WHERE idtelefonos = " . $oValueObject->get_idtelefonos();
        $resultado = mysql_query($sql) or die(false);
        if($resultado){return TRUE;}
        else {return FALSE;}
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param TelefonosValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM telefonos WHERE idtelefonos = "
                . $oValueObject->get_idtelefonos();
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_idclientes($fila->idclientes);
            $oValueObject->set_numero($fila->numero);
            return $oValueObject;
        }
        else {return FALSE;}
    }
    
    /**
     * Busca todos los datps por el el identificador del cliente.
     * @param TelefonosValueObject $oValueObject
     * @return \TelefonosValueObject|boolean
     */
    public function buscarPorCliente($oValueObject) {
        $sql = "SELECT * FROM telefonos WHERE idclientes = "
                . $oValueObject->get_idclientes();
//        $resultado = mysql_query($sql) or die(false);
        $resultado = mysql_query($sql);
        if($resultado){
            $aTelefonos = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oTelefonos = new TelefonosValueObject();
                $oTelefonos->set_idtelefonos($fila->idtelefonos);
                $oTelefonos->set_idclientes($fila->idclientes);
                $oTelefonos->set_numero($fila->numero);
                $aTelefonos[] = $oTelefonos;
                unset($oTelefonos);
            }
            return $aTelefonos;
        }
        else {return FALSE;}
    }
    /**
     * Busca todos los datos. 
     * @return \TelefonosValueObject|boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM telefonos;";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $aTelefonos = array();
            while ($fila = mysql_fetch_array($resultado)) {
                $oTelefonos = new TelefonosValueObject();
                $oTelefonos->set_idtelefonos($fila->idtelefonos);
                $oTelefonos->set_idclientes($fila->idclientes);
                $oTelefonos->set_numero($fila->numero);
                $aTelefonos[] = $oTelefonos;
                unset($oTelefonos);
            }
            return $aTelefonos;
        }
        else {return FALSE;}
    }

    public function contar() {
        
    }

    public function existe($oValueObject) {
        
    }

    /**
     * 
     * @param TelefonosValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO telefonos (idclientes, numero) VALUES ("
                . $oValueObject->get_idclientes() . ", '"
                . $oValueObject->get_numero() . "');";
//        $resultado = mysql_query($sql) or die('false');
        $resultado = mysql_query($sql);
        if($resultado){return TRUE;}
        else {return FALSE;}
    }
}
