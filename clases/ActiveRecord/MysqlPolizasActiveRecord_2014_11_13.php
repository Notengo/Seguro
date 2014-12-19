<?php

include_once '../clases/ValueObject/PolizasValueObject.php';
include_once 'activeRecordInterface.php';

/**
 * Description of MysqlPolizasActiveRecord
 *
 * @author Martin
 */
class MysqlPolizasActiveRecord implements ActiveRecord {

    public function actualizar($oValueObject) {
        
    }

    /**
     * 
     * @param PolizasValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        $sql = "UPDATE `polizas`"
                . "SET fechabaja = '" . $oValueObject->get_fechabaja() . "'"
                . " WHERE nropoliza = '" . $oValueObject->get_nropoliza() . "'";
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param PolizasValueObject $oValueObject
     * @return boolean|array
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM `polizas` WHERE nropoliza = '" . $oValueObject->get_nropoliza() . "'";
        $resultado = mysql_query($sql);
        $fila = mysql_fetch_object($resultado);
        if ($fila) {
            $oValueObject->set_nropoliza($fila->nropoliza);
            $oValueObject->set_idcompanias($fila->idcompanias);
            $oValueObject->set_idclientes($fila->idclientes);
            $oValueObject->set_patente($fila->patente);
            $oValueObject->set_idcoberturas($fila->idcoberturas);
            $oValueObject->set_idotrosriesgos($fila->idotrosriesgos);
            $oValueObject->set_vigenciadesde($fila->vigenciadesde);
            $oValueObject->set_vigenciahasta($fila->vigenciahasta);
            $oValueObject->set_segvencimiento($fila->segvencimiento);
            $oValueObject->set_premio($fila->premio);
            $oValueObject->set_prima($fila->prima);
            $oValueObject->set_cuotas($fila->cuotas);
            $oValueObject->set_idformaspago($fila->idformaspago);
            $oValueObject->set_cbu($fila->cbu);
            $oValueObject->set_fechabaja($fila->fechabaja);
            return $oValueObject;
        } else {
            return false;
        }
    }

    /**
     * 
     * @return boolean|array
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM `polizas`;";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $aPoliza = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new PolizasValueObject();
                $oValueObject->set_nropoliza($fila->nropoliza);
                $oValueObject->set_idcompanias($fila->idcompanias);
                $oValueObject->set_idclientes($fila->idclientes);
                $oValueObject->set_patente($fila->patente);
                $oValueObject->set_idcoberturas($fila->idcoberturas);
                $oValueObject->set_idotrosriesgos($fila->idotrosriesgos);
                $oValueObject->set_vigenciadesde($fila->vigenciadesde);
                $oValueObject->set_vigenciahasta($fila->vigenciahasta);
                $oValueObject->set_segvencimiento($fila->segvencimiento);
                $oValueObject->set_premio($fila->premio);
                $oValueObject->set_prima($fila->prima);
                $oValueObject->set_cuotas($fila->cuotas);
                $oValueObject->set_idformaspago($fila->idformaspago);
                $oValueObject->set_cbu($fila->cbu);
                $oValueObject->set_fechabaja($fila->fechabaja);
                $aPoliza[] = $oValueObject;
                unset($oValueObject);
            }
            return $aPoliza;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param PolizasValueObject $oValueObject
     * @return boolean|\PolizasValueObject
     */
    public function buscarTodoCliente($oValueObject) {
        $sql = "SELECT * FROM polizas WHERE idclientes= " . $oValueObject->get_idclientes() . ";";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $aPoliza = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new PolizasValueObject();
                $oValueObject->set_nropoliza($fila->nropoliza);
                $oValueObject->set_idcompanias($fila->idcompanias);
                $oValueObject->set_idclientes($fila->idclientes);
                $oValueObject->set_patente($fila->patente);
                $oValueObject->set_idcoberturas($fila->idcoberturas);
                $oValueObject->set_idotrosriesgos($fila->idotrosriesgos);
                $oValueObject->set_vigenciadesde($fila->vigenciadesde);
                $oValueObject->set_vigenciahasta($fila->vigenciahasta);
                $oValueObject->set_segvencimiento($fila->segvencimiento);
                $oValueObject->set_premio($fila->premio);
                $oValueObject->set_prima($fila->prima);
                $oValueObject->set_cuotas($fila->cuotas);
                $oValueObject->set_idformaspago($fila->idformaspago);
                $oValueObject->set_cbu($fila->cbu);
                $oValueObject->set_fechabaja($fila->fechabaja);
                $aPoliza[] = $oValueObject;
                unset($oValueObject);
            }
            return $aPoliza;
        } else {
            return false;
        }
    }

    public function contar() {
        
    }

    /**
     * 
     * @param PolizasValueObject $oValueObject
     * @return boolean
     */
    public function existe($oValueObject) {
        $sql = "SELECT COUNT(*) FROM polizas"
                . " WHERE idclientes = " . $oValueObject->get_idclientes()
                . " AND idvehiculos = " . $oValueObject->get_idvehiculos() . ";";
        $resultado = mysql_query($sql);
        if ($resultado) {
            $resultado = mysql_fetch_array($resultado);
            if ($resultado[0] > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param PolizasValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO polizas (nropoliza, idcompanias, idclientes, patente, "
                . "idcoberturas, idotrosriesgos, vigenciadesde, vigenciahasta, "
                . "segvencimiento, premio, prima, cuotas, idformaspago, idvehiculos,"
                . "observacion, cbu) VALUES ('"
                . $oValueObject->get_nropoliza() . "', ";
        if ($oValueObject->get_idcompanias() != '') {
            $sql .= $oValueObject->get_idcompanias() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_idclientes() != '') {
            $sql .= $oValueObject->get_idclientes() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_patente() != '') {
            $sql .= "'" . $oValueObject->get_patente() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_idcoberturas() != '') {
            $sql .= $oValueObject->get_idcoberturas() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_idotrosriesgos() != '') {
            $sql .= $oValueObject->get_idotrosriesgos() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_vigenciadesde() != '') {
            $sql .= "'" . $oValueObject->get_vigenciadesde() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_vigenciahasta() != '') {
            $sql .= "'" . $oValueObject->get_vigenciahasta() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_segvencimiento() != '') {
            $sql .= $oValueObject->get_segvencimiento() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_premio() != '') {
            $sql .= "'" . $oValueObject->get_premio() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_prima() != '') {
            $sql .= "'" . $oValueObject->get_prima() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_cuotas() != '') {
            $sql .= $oValueObject->get_cuotas() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_idformaspago() != '') {
            $sql .= $oValueObject->get_idformaspago() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_idvehiculos() != '') {
            $sql .= $oValueObject->get_idvehiculos() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_observacion() != '') {
            $sql .= "'".$oValueObject->get_observacion() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if ($oValueObject->get_cbu() != '') {
            $sql .= "'" . $oValueObject->get_cbu() . "');";
        } else {
            $sql .= "NULL);";
        }
echo $sql;
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}