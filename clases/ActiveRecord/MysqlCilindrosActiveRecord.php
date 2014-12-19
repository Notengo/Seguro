<?php

require_once 'activeRecordInterface.php';
require_once '../clases/ValueObject/CilindrosValueObject.php';

/**
 * Description of MysqlCilindrosActiveRecord
 *
 * @author Martin
 */
class MysqlCilindrosActiveRecord implements ActiveRecord {

    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param CilindrosValueObject $oValueObject
     * @return boolean|\CilindrosValueObject
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM cilindros "
                . "WHERE idvehiculos = " . $oValueObject->get_idvehiculos();
        $resultado = mysql_query($sql) or die(false);

        $aCilindro = array();
        if ($resultado) {
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new CilindrosValueObject();
                $oValueObject->set_idcilindros($fila->idcilindros);
                $oValueObject->set_marca($fila->marca);
                $oValueObject->set_nro($fila->nro);
                $oValueObject->set_idvehiculos($fila->idvehiculos);
                $aCilindro[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCilindro;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param CilindrosValueObject $oValueObject
     * @return boolean|\CilindrosValueObject
     */
    public function buscarMarca($oValueObject) {
        $sql = "SELECT idcilindros, marca  FROM cilindros "
                . "WHERE idvehiculos = " . $oValueObject->get_idvehiculos()
                . " AND nro = " . $oValueObject->get_nro();
        $resultado = mysql_query($sql) or die(false);
        $fila = mysql_fetch_object($resultado);
        if ($fila) {
            $oValueObject->set_idcilindros($fila->idcilindros);
            $oValueObject->set_marca($fila->marca);
            $oValueObject->set_nro($fila->nro);
            $oValueObject->set_idvehiculos($fila->idvehiculos);
            $aCilindro[] = $oValueObject;
            unset($oValueObject);
            return $aCilindro;
        } else {
            return FALSE;
        }
    }

    public function buscarTodo() {
        
    }

    public function contar() {
        
    }

    /**
     * 
     * @param CilindrosValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM cilindros WHERE idvehiculos = " . $oValueObject->get_idvehiculos()
                . " AND  nro = '" . $oValueObject->get_idcilindros() . "';";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_array($resultado);
        if ($resultado[0] > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param CilindrosValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO cilindros (nro, marca, idvehiculos) VALUES ("
                . strtoupper($oValueObject->get_nro()) . ", '"
                . strtoupper($oValueObject->get_marca()) . "', "
                . $oValueObject->get_idvehiculos() . ");";
        if (mysql_query($sql)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM cilindros");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {
                $oValueObject->set_idcilindros($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
