<?php
/**
 * Description of PlanillasValueObject
 *
 * @author Linking informática
 */

  class PlanillasValueObject
{
    private $_idPlanilla, $_idCompania,$_fecha,$_nroPlanilla,$_nroPoliza,$_nroCuota, $_idUsuario, $_nroConfirmacion;

    ////////////////////////////////////////////////////////////
    
    public function set_idPlanilla($_idPlanilla) {
        $this->_idPlanilla = $_idPlanilla;
    }

    public function set_idCompania($_idCompania) {
        $this->_idCompania = $_idCompania;
    }

    public function set_fecha($_fecha) {
        $this->_fecha = $_fecha;
    }

    public function set_nroPlanilla($_nroPlanilla) {
        $this->_nroPlanilla = $_nroPlanilla;
    }

    public function set_nroPoliza($_nroPoliza) {
        $this->_nroPoliza = $_nroPoliza;
    }

    public function set_nroCuota($_nroCuota) {
        $this->_nroCuota = $_nroCuota;
    }
    public function set_idUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
        return $this;
    }
    public function set_nroConfirmacion($_nroConfirmacion) {
        $this->_nroConfirmacion = $_nroConfirmacion;
        return $this;
    }

    
        public function get_idPlanilla() {
        return $this->_idPlanilla;
    }

    public function get_idCompania() {
        return $this->_idCompania;
    }

    public function get_fecha() {
        return $this->_fecha;
    }

    public function get_nroPlanilla() {
        return $this->_nroPlanilla;
    }

    public function get_nroPoliza() {
        return $this->_nroPoliza;
    }

    public function get_nroCuota() {
        return $this->_nroCuota;
    }
    public function get_idUsuario() {
        return $this->_idUsuario;
    }


    public function get_nroConfirmacion() {
        return $this->_nroConfirmacion;
    }



}
