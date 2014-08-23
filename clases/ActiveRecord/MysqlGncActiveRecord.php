<?php
require_once 'activeRecordInterface.php';
//require_once '../ValueObject/ModelosValueObject.php';
require_once '../clases/ValueObject/GncValueObject.php';

/**
 * Description of MysqlGncActiveRecord
 *
 * @author ssrolanr
 */
class MysqlGncActiveRecord {

    /**
     * @param GncValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE gnc SET regulador = '"
                . $oValueObject->get_regulador() . "', marca = '"
                . $oValueObject->get_marca() . "', idvehiculos = "
                . $oValueObject->get_idvehiculos() 
                . " WHERE idgnc = " . $oValueObject->get_idgnc() . ";";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param GncValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "DELETE FROM gnc WHERE idgnc = " . $oValueObject->get_idgnc() . ";";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param GncValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM gnc WHERE idgnc = "
                . $oValueObject->get_idgnc() . ";";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_idgnc($fila->idgnc);
            $oValueObject->set_marca($fila->marca);
            $oValueObject->set_regulador($fila->regulador);
            $oValueObject->set_idvehiculos($fila->idvehiculos);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param GncValueObject $oValueObject
     * @return boolean
     */
    public function buscarPorRegulador($oValueObject) {
        $sql = "SELECT * FROM gnc WHERE regulador = '"
                . $oValueObject->get_regulador() . "';";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_idgnc($fila->idgnc);
            $oValueObject->set_marca($fila->marca);
            $oValueObject->set_regulador($fila->regulador);
            $oValueObject->set_idvehiculos($fila->idvehiculos);
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
        $sql = "SELECT * FROM gnc;";
        $resultado = mysql_query($sql) or die(false);
        $aGnc = array();
        if ($resultado) {
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new GncValueObject();
                $oValueObject->set_idgnc($fila->idgnc);
                $oValueObject->set_marca($fila->marca);
                $oValueObject->set_regulador($fila->regulador);
                $oValueObject->set_idvehiculos($fila->idvehiculos);
                $aGnc[] = $oValueObject;
                unset($oValueObject);
            }
            return $aGnc;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @return int
     */
    public function contar() {
        $sql = "SELECT COUNT(*) FROM gnc;";
        $resultado = mysql_query($sql);
        $resultado = mysql_fetch_array($resultado);
        if ($resultado[0] > 0) {
            return $resultado[0];
        } else {
            return 0;
        }
    }

    /**
     * 
     * @param GncValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM gnc WHERE regulador = '" . $oValueObject->get_regulador() . "';";
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
     * @param GncValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO gnc (regulador, marca, idvehiculos) VALUES ('"
                . $oValueObject->get_regulador() . "', '"
                . $oValueObject->get_marca() . "', "
                . $oValueObject->get_idvehiculos() . ");";
        if (mysql_query($sql) or die(false)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM gnc");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {
                $oValueObject->set_idgnc($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
