<?php
/**
 * Description of CompaniasValueObject
 *
 * @author ssrolanr
 */
class CompaniasValueObject {
    private $_idcompanias, $_razonsocial, $_nroproductor, $_cuit, $_direccion;
    private $_numero, $_piso, $_depto, $_cp, $_telefono, $_email, $_link, $_imagen;

    public function get_idcompanias() {
        return $this->_idcompanias;
    }

    public function get_razonsocial() {
        return $this->_razonsocial;
    }

    public function get_nroproductor() {
        return $this->_nroproductor;
    }

    public function get_cuit() {
        return $this->_cuit;
    }

    public function get_direccion() {
        return $this->_direccion;
    }

    public function get_numero() {
        return $this->_numero;
    }

    public function get_piso() {
        return $this->_piso;
    }

    public function get_depto() {
        return $this->_depto;
    }

    public function get_cp() {
        return $this->_cp;
    }

    public function get_telefono() {
        return $this->_telefono;
    }

    public function get_email() {
        return $this->_email;
    }

    public function get_link() {
        return $this->_link;
    }

    public function get_imagen() {
        return $this->_imagen;
    }

    public function set_idcompanias($_idcompanias) {
        $this->_idcompanias = $_idcompanias;
    }

    public function set_razonsocial($_razonsocial) {
        $this->_razonsocial = $_razonsocial;
    }

    public function set_nroproductor($_nroproductor) {
        $this->_nroproductor = $_nroproductor;
    }

    public function set_cuit($_cuit) {
        $this->_cuit = $_cuit;
    }

    public function set_direccion($_direccion) {
        $this->_direccion = $_direccion;
    }

    public function set_numero($_numero) {
        $this->_numero = $_numero;
    }

    public function set_piso($_piso) {
        $this->_piso = $_piso;
    }

    public function set_depto($_depto) {
        $this->_depto = $_depto;
    }

    public function set_cp($_cp) {
        $this->_cp = $_cp;
    }

    public function set_telefono($_telefono) {
        $this->_telefono = $_telefono;
    }

    public function set_email($_email) {
        $this->_email = $_email;
    }

    public function set_link($_link) {
        $this->_link = $_link;
    }

    public function set_imagen($_imagen) {
        $this->_imagen = $_imagen;
    }
}