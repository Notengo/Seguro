<?php
require_once 'activeRecordInterface.php';
require_once '../clases/ValueObject/LocalidadesValueObject.php';
/**
 * Description of MysqlLocalidadesActiveRecord
 *
 * @author Martin
 */
class MysqlLocalidadesActiveRecord implements ActiveRecord {
    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param LocalidadesValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM localidades WHERE idlocalidades = "
                . $oValueObject->get_idlocalidades() . ";";
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_localidad(utf8_encode($fila->localidad));
            $oValueObject->set_id_provincia($fila->id_provincia);
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    public function buscarTodo() {
        
    }

    public function contar() {
        
    }

    public function existe($oValueObject) {
        
    }

    public function guardar($oValueObject) {
        
    }

}
