<?php

/**
 * Description of CuotasValueObject
 *
 * @author Linkin informatica
 */
class CuotasValueObject {

    private $_nropoliza, $_nrocuota, $_monto, $_vencimiento1, $_vencimiento2;
    private $_pago, $_fechapago, $recibo, $_planilla;

    ///////////////////////////
    public function get_nropoliza() {
        return $this->_nropoliza;
    }

    public function get_nrocuota() {
        return $this->_nrocuota;
    }

    public function get_monto() {
        return $this->_monto;
    }

    public function get_vencimiento1() {
        return $this->_vencimiento1;
    }

    public function get_vencimiento2() {
        return $this->_vencimiento2;
    }

    public function get_pago() {
        return $this->_pago;
    }

    public function get_fechapago() {
        return $this->_fechapago;
    }

    public function set_nropoliza($_nropoliza) {
        $this->_nropoliza = $_nropoliza;
    }

    public function set_nrocuota($_nrocuota) {
        $this->_nrocuota = $_nrocuota;
    }

    public function set_monto($_monto) {
        $this->_monto = $_monto;
    }

    public function set_vencimiento1($_vencimiento1) {
        $this->_vencimiento1 = $_vencimiento1;
    }

    public function set_vencimiento2($_vencimiento2) {
        $this->_vencimiento2 = $_vencimiento2;
    }

    public function set_pago($_pago) {
        $this->_pago = $_pago;
    }

    public function set_fechapago($_fechapago) {
        $this->_fechapago = $_fechapago;
    }

    function getRecibo() {
        return $this->recibo;
    }

    function setRecibo($recibo) {
        $this->recibo = $recibo;
        return $this;
    }

    public function get_planilla() {
        return $this->_planilla;
    }

    public function set_planilla($_planilla) {
        $this->_planilla = $_planilla;
        return $this;
    }
}
