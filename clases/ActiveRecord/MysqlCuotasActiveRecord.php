<?php

include_once '../clases/ValueObject/CuotasValueObject.php';
include_once 'activeRecordInterface.php';

/**
 * Description of MysqlCuotasActiveRecord
 *
 * @author Linking informatica
 */
class MysqlCuotasActiveRecord implements ActiveRecord {

    /**
     * 
     * @param CuotasValueObject $oValueObject
     */
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

    public function existe($oValueObject) {
        
    }

    /**
     * 
     * @param CuotasValueObject $oValueObject
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO cuotas (nropoliza, nrocuota, monto, vencimiento1, vencimiento2,pago,fechapago)"
                . " VALUES ('" . $oValueObject->get_nropoliza() . "', '"
                . $oValueObject->get_nrocuota() . "', "
                . "'" . $oValueObject->get_monto() . "', '" . $oValueObject->get_vencimiento1()
                . "', '" . $oValueObject->get_vencimiento2() . "', '" . $oValueObject->get_pago()
                . "', '" . $oValueObject->get_fechapago() . "')";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
