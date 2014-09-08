<?php
include_once '../clases/ValueObject/PolizasValueObject.php';
include_once 'activeRecordInterface.php';
/**
 * Description of MysqlPolizasActiveRecord
 *
 * @author Martin
 */
class MysqlPolizasActiveRecord implements ActiveRecord{
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
     * @param PolizasValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO polizas (nropoliza, idcompanias, idclientes, patente, "
                . "idcoberturas, idotrosriesgos, vigenciadesde, vigenciahasta, "
                . "segvencimiento, premio, prima, cuotas, idformaspago, cbu) VALUES ('"
                . $oValueObject->get_nropoliza() . "', ";
        if($oValueObject->get_idcompanias()!=''){
            $sql .= $oValueObject->get_idcompanias() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_idclientes()!=''){
            $sql .= $oValueObject->get_idclientes() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_patente()!=''){
            $sql .= "'".$oValueObject->get_patente() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_idcoberturas()!=''){
            $sql .= $oValueObject->get_idcoberturas() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_idotrosriesgos()!=''){
            $sql .= $oValueObject->get_idotrosriesgos() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_vigenciadesde()!=''){
            $sql .= "'".$oValueObject->get_vigenciadesde() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_vigenciahasta()!=''){
            $sql .= "'".$oValueObject->get_vigenciahasta() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_segvencimiento()!=''){
            $sql .= $oValueObject->get_segvencimiento() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_premio()!=''){
            $sql .= "'".$oValueObject->get_premio() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_prima()!=''){
            $sql .= "'".$oValueObject->get_prima() . "', ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_cuotas()!=''){
            $sql .= $oValueObject->get_cuotas() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_idformaspago()!=''){
            $sql .= $oValueObject->get_idformaspago() . ", ";
        } else {
            $sql .= "NULL, ";
        }
        if($oValueObject->get_cbu()!=''){
            $sql .= "'".$oValueObject->get_cbu() . "');";
        } else {
            $sql .= "NULL);";
        }
        
        
        if (mysql_query($sql)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
