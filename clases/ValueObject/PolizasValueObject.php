<?php

/**
 * Description of PolizasValueObject
 *
 * @author Martin
 */
class PolizasValueObject {

    private $_nropoliza, $_idcompanias, $_idclientes, $_patente, $_idcoberturas, $_idotrosriesgos;
    private $_vigenciadesde, $_vigenciahasta, $_segvencimiento, $_premio, $_prima, $_cuotas, $_idformaspago,
            $_cbu, $_fechabaja, $_idvehiculos, $_observacion;

    public function get_nropoliza() {
        return $this->_nropoliza;
    }

    public function get_idcompanias() {
        return $this->_idcompanias;
    }

    public function get_idclientes() {
        return $this->_idclientes;
    }

    public function get_patente() {
        return $this->_patente;
    }

    public function get_idcoberturas() {
        return $this->_idcoberturas;
    }

    public function get_idotrosriesgos() {
        return $this->_idotrosriesgos;
    }

    public function get_vigenciadesde() {
        return $this->_vigenciadesde;
    }

    public function get_vigenciahasta() {
        return $this->_vigenciahasta;
    }

    public function get_segvencimiento() {
        return $this->_segvencimiento;
    }

    public function get_premio() {
        return $this->_premio;
    }

    public function get_prima() {
        return $this->_prima;
    }

    public function get_cuotas() {
        return $this->_cuotas;
    }

    public function get_idformaspago() {
        return $this->_idformaspago;
    }

    public function get_cbu() {
        return $this->_cbu;
    }

    public function set_nropoliza($_nropoliza) {
        $this->_nropoliza = $_nropoliza;
    }

    public function set_idcompanias($_idcompanias) {
        $this->_idcompanias = $_idcompanias;
    }

    public function set_idclientes($_idclientes) {
        $this->_idclientes = $_idclientes;
    }

    public function set_patente($_patente) {
        $this->_patente = $_patente;
    }

    public function set_idcoberturas($_idcoberturas) {
        $this->_idcoberturas = $_idcoberturas;
    }

    public function set_idotrosriesgos($_idotrosriesgos) {
        $this->_idotrosriesgos = $_idotrosriesgos;
    }

    public function set_vigenciadesde($_vigenciadesde) {
        $this->_vigenciadesde = $_vigenciadesde;
    }

    public function set_vigenciahasta($_vigenciahasta) {
        $this->_vigenciahasta = $_vigenciahasta;
    }

    public function set_segvencimiento($_segvencimiento) {
        $this->_segvencimiento = $_segvencimiento;
    }

    public function set_premio($_premio) {
        $this->_premio = $_premio;
    }

    public function set_prima($_prima) {
        $this->_prima = $_prima;
    }

    public function set_cuotas($_cuotas) {
        $this->_cuotas = $_cuotas;
    }

    public function set_idformaspago($_idformaspago) {
        $this->_idformaspago = $_idformaspago;
    }

    public function set_cbu($_cbu) {
        $this->_cbu = $_cbu;
    }

    public function get_fechabaja() {
        return $this->_fechabaja;
    }

    public function set_fechabaja($_fechabaja) {
        $this->_fechabaja = $_fechabaja;
        return $this;
    }

    function get_idvehiculos() {
        return $this->_idvehiculos;
    }

    function set_idvehiculos($_idvehiculos) {
        $this->_idvehiculos = $_idvehiculos;
        return $this;
    }

    function get_observacion() {
        return $this->_observacion;
    }

    function set_observacion($_observacion) {
        $this->_observacion = $_observacion;
        return $this;
    }
}
