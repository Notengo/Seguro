<?php

/**
 * Description of MysqlPlanillasActiveRecord
 *
 * @author Linking Informática
 */
include_once '../clases/ValueObject/PlanillasValueObject.php';
include_once 'activeRecordInterface.php';

class MysqlPlanillasActiveRecord implements ActiveRecord {

    public function actualizar($oValueObject) {
        
    }

    public function borrar($oValueObject) {
        
    }

    /**
     * 
     * @param PlanillasValueObject $oValueObject
     * @return boolean|\PlanillasValueObject
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM planilla "
                . "WHERE fecha='" . $oValueObject->get_fecha() . "' AND idCompania='" . $oValueObject->get_idCompania() . "';";
        $resultado = mysql_query($sql);

        if ($resultado) {
            $aPlanilla = array();
            while ($valores = mysql_fetch_object($resultado)) {
                $oValueObject = new PlanillasValueObject();
                $oValueObject->set_idPlanilla($valores->idPlanilla);
                $oValueObject->set_idCompania($valores->idCompania);
                $oValueObject->set_fecha($valores->fecha);
                $oValueObject->set_nroPlanilla($valores->nroPlanilla);
                $aPlanilla[] = $oValueObject;
                unset($oValueObject);
            }


            return $aPlanilla;
        } else {

            return false;
        }
    }

    /**
     * 
     * @param PlanillasValueObject $oValueObject
     * @return boolean|\PlanillasValueObject
     */
    public function buscarNro($oValueObject) {
        $sql = "SELECT * FROM planilla "
                . "WHERE idCompania='" . $oValueObject->get_idCompania() . "' "
                . "AND nroPlanilla='" . $oValueObject->get_nroPlanilla() . "';";
        $resultado = mysql_query($sql);

        if ($resultado) {
            $aPlanilla = array();
            while ($valores = mysql_fetch_object($resultado)) {
                $oValueObject = new PlanillasValueObject();
                $oValueObject->set_idPlanilla($valores->idPlanilla);
                $oValueObject->set_idCompania($valores->idCompania);
                $oValueObject->set_fecha($valores->fecha);
                $oValueObject->set_nroPlanilla($valores->nroPlanilla);
                $aPlanilla[] = $oValueObject;
                unset($oValueObject);
            }
            return $aPlanilla;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param PlanillasValueObject $oValueObject
     * @return boolean|\PlanillasValueObject
     */
    public function buscarHoy($oValueObject) {
        $sql = "SELECT * FROM planilla "
                . "WHERE fecha='" . $oValueObject->get_fecha() . "';";
        $resultado = mysql_query($sql);

        if ($resultado) {
            $aPlanilla = array();
            while ($valores = mysql_fetch_object($resultado)) {
                $oValueObject = new PlanillasValueObject();
                $oValueObject->set_idPlanilla($valores->idPlanilla);
                $oValueObject->set_idCompania($valores->idCompania);
                $oValueObject->set_fecha($valores->fecha);
                $oValueObject->set_nroPlanilla($valores->nroPlanilla);
                $aPlanilla[] = $oValueObject;
                unset($oValueObject);
            }


            return $aPlanilla;
        } else {

            return false;
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
     * @param PlanillasValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO planilla (idPlanilla, idCompania, fecha, nroPlanilla) VALUES("
                . "'" . $oValueObject->get_idPlanilla() . "', "
                . "'" . $oValueObject->get_idCompania() . "', "
                . "'" . $oValueObject->get_fecha() . "', "
                . "'" . $oValueObject->get_nroPlanilla() . "')";
        if (mysql_query($sql)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM planilla;");
            $id = mysql_fetch_array($result);
            if ($id[0] <> 0) {//si trae alguna id la seteo
                $oValueObject->set_idPlanilla($id[0]);
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * 
     * @param PlanillasValueObject $oValueObject
     * @return boolean
     */
    public function guardarDetalle($oValueObject) {

        $sql = "INSERT INTO detalleplanilla (idPlanilla, nroPoliza, nroCuota, idCompania) VALUES("
                . "'" . $oValueObject->get_idPlanilla() . "', "
                . "'" . $oValueObject->get_nroPoliza() . "', "
                . "'" . $oValueObject->get_nroCuota() . "',"
                . "'" . $oValueObject->get_idCompania() . "')";
        if (mysql_query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param PlanillasValueObject $oValueObject
     * @return boolean
     */
    public function ultimaPlanilla($oValueObject) {

        $sql = "SELECT MAX(idPlanilla) FROM planilla WHERE  idCompania='" . $oValueObject->get_idCompania() . "'";
        $valor = mysql_query($sql);
        $objeto = mysql_fetch_array($valor);
        $id = $objeto[0];
        $id = $id + 1;
        return $id;
    }

}
