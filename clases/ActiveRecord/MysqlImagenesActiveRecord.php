<?php
include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/ImagenesValueObject.php';

/**
 * Description of MysqlImagenesActiveRecord
 *
 * @author ssrolanr
 */
class MysqlImagenesActiveRecord implements ActiveRecord {

    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param ImagenesValueObject $oValueObject
     * @return \GncValueObject|boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT nro, idvehiculos FROM `imagenes` "
                . "WHERE idvehiculos = " . $oValueObject->get_idvehiculos() . ";";
        $resultado = mysql_query($sql) or die(false);
        $aImagen = array();
        if ($resultado) {
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new ImagenesValueObject();
                $oValueObject->set_nro($fila->nro);
//                $oValueObject->set_foto($fila->foto);
                $oValueObject->set_idvehiculos($fila->idvehiculos);
                $aImagen[] = $oValueObject;
                unset($oValueObject);
            }
            return $aImagen;
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
