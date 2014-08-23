<?php
require_once 'activeRecordInterface.php';
require_once '../clases/ValueObject/CilindrosValueObject.php';
/**
 * Description of MysqlCilindrosActiveRecord
 *
 * @author Martin
 */
class MysqlCilindrosActiveRecord implements ActiveRecord{
    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    public function buscar($oValueObject) {
        
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
                . $oValueObject->get_nro() . ", '"
                . $oValueObject->get_marca() . "', "
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
