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
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE cuotas SET fechapago = "
                . "'" . $oValueObject->get_fechapago()
                . "', pago = " . $oValueObject->get_pago()
                . ", recibo = '" . $oValueObject->getRecibo() . "'"
                . ", vencimiento1 = '" . $oValueObject->get_vencimiento1() . "'"
                . ", vencimiento2 = '" . $oValueObject->get_vencimiento2() . "'"
                . " WHERE nrocuota = " . $oValueObject->get_nrocuota()
                . " AND nropoliza = '" . $oValueObject->get_nropoliza() . "';";
        
        echo $sql;
        $resultado = mysql_query($sql);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param CuotasValueObject $oValueObject
     * @return boolean
     */
    public function enPlanilla($oValueObject) {
        $sql = "UPDATE cuotas SET planilla = " . $oValueObject->get_planilla()
                . " WHERE nrocuota = " . $oValueObject->get_nrocuota()
                . " AND nropoliza = '" . $oValueObject->get_nropoliza() . "';";
        $resultado = mysql_query($sql);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param CuotasValueObject $oValueObject
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM `cuotas` WHERE nropoliza = '"
                . $oValueObject->get_nropoliza . "';";
    }

    /**
     * 
     * @param CuotasValueObject $oValueObject
     * @return boolean|\CuotasValueObject
     */
    public function buscarPFecha($oValueObject) {
        $sql = "SELECT * FROM cuotas WHERE fechapago = '"
                . $oValueObject->get_fechapago() . "';";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $aCuotas = array();
            while ($tupla = mysql_fetch_object($resultado)) {
                $oValueObject = new CuotasValueObject();
                $oValueObject->set_nrocuota($tupla->nrocuota);
                $oValueObject->set_nropoliza($tupla->nropoliza);
                $oValueObject->set_monto($tupla->monto);
                $oValueObject->set_vencimiento1($tupla->vencimiento1);
                $oValueObject->set_vencimiento2($tupla->vencimiento2);
                $oValueObject->set_pago($tupla->pago);
                $oValueObject->set_fechapago($tupla->fechapago);
                $oValueObject->setRecibo($tupla->recibo);
                $aCuotas[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCuotas;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param CuotasValueObject $oValueObject
     * @return boolean|\CuotasValueObject
     */
    public function buscarPoliza($oValueObject) {
        $sql = "SELECT * FROM cuotas WHERE nropoliza = '"
                . $oValueObject->get_nropoliza() . "';";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $aCuotas = array();
            while ($tupla = mysql_fetch_object($resultado)) {
                $oValueObject = new CuotasValueObject();
                $oValueObject->set_nrocuota($tupla->nrocuota);
                $oValueObject->set_nropoliza($tupla->nropoliza);
                $oValueObject->set_monto($tupla->monto);
                $oValueObject->set_vencimiento1($tupla->vencimiento1);
                $oValueObject->set_vencimiento2($tupla->vencimiento2);
                $oValueObject->set_pago($tupla->pago);
                $oValueObject->set_fechapago($tupla->fechapago);
                $oValueObject->setRecibo($tupla->recibo);
                $aCuotas[] = $oValueObject;
                unset($oValueObject);
            }
            return $aCuotas;
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

    /**
     * 
     * @param CuotasValueObject $oValueObject
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO cuotas (nropoliza, nrocuota, monto, vencimiento1, vencimiento2, pago, fechapago, recibo)"
                . " VALUES ('" . $oValueObject->get_nropoliza() . "', '"
                . $oValueObject->get_nrocuota() . "', "
                . "'" . $oValueObject->get_monto() . "', '" . $oValueObject->get_vencimiento1()
                . "', '" . $oValueObject->get_vencimiento2() . "' ";
        if ($oValueObject->get_pago() != '') {
            $sql .= ", '" . $oValueObject->get_pago() . "'";
        } else {
            $sql .= ", 0";
        }
        if ($oValueObject->get_fechapago() != '') {
            $sql .= ", '" . $oValueObject->get_fechapago() . "'";
        } else {
            $sql .= ", '0000-00-00'";
        }
        $sql .= ", '" . $oValueObject->getRecibo() . "')";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
