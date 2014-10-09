<?php

require_once '../clases/ValueObject/CompaniasValueObject.php';
require_once 'activeRecordInterface.php';

/**
 * Description of MysqlCompaniasActiveRecord
 *
 * @author ssrolanr
 */
class MysqlCompaniasActiveRecord implements ActiveRecord {

    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    public function buscar($oValueObject) {
        
    }

    public function buscarTodo() {
        $sql = "SELECT * FROM `companias`;";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $aCompania = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new CompaniasValueObject();
                $oValueObject->set_idcompanias($fila->idcompanias);
                $oValueObject->set_razonsocial($fila->razonsocial);
                $oValueObject->set_nroproductor($fila->nroproductor);
                $oValueObject->set_cuit($fila->cuit);
                $oValueObject->set_direccion($fila->direccion);
                $oValueObject->set_numero($fila->numero);
                $oValueObject->set_piso($fila->piso);
                $oValueObject->set_depto($fila->depto);
                $oValueObject->set_cp($fila->cp);
                $oValueObject->set_telefono($fila->telefono);
                $oValueObject->set_email($fila->email);
                $oValueObject->set_link($fila->link);
//                $oValueObject->set_imagen($_imagen);
                $aCompania[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCompania;
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
     * @param CompaniasValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO companias (razonsocial, nroproductor, cuit, direccion,"
                . " numero, piso, depto, cp, telefono, email, link, imagen) "
                . "VALUES ("
                . "'" . $oValueObject->get_razonsocial() . "', "
                . $oValueObject->get_nroproductor() . ", "
                . "'" . $oValueObject->get_cuit() . "', "
                . "'" . $oValueObject->get_direccion() . "', "
                . $oValueObject->get_numero() . ", "
                . $oValueObject->get_piso() . ", "
                . "'" . $oValueObject->get_depto() . "', "
                . "'" . $oValueObject->get_cp() . "', "
                . "'" . $oValueObject->get_telefono() . "', "
                . "'" . $oValueObject->get_email() . "', "
                . "'" . $oValueObject->get_link() . "', "
                . "'" . $oValueObject->get_imagen() . "');";

        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function buscarC($id) {
        $sql = "SELECT * FROM companias WHERE idcompanias='" . $id . "'";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $aCompania = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new CompaniasValueObject();
                $oValueObject->set_idcompanias($fila->idcompanias);
                $oValueObject->set_razonsocial($fila->razonsocial);
                $oValueObject->set_nroproductor($fila->nroproductor);
                $oValueObject->set_cuit($fila->cuit);
                $oValueObject->set_direccion($fila->direccion);
                $oValueObject->set_numero($fila->numero);
                $oValueObject->set_piso($fila->piso);
                $oValueObject->set_depto($fila->depto);
                $oValueObject->set_cp($fila->cp);
                $oValueObject->set_telefono($fila->telefono);
                $oValueObject->set_email($fila->email);
                $oValueObject->set_link($fila->link);
                $aCompania[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCompania;
        } else {
            return FALSE;
        }
    }

}
