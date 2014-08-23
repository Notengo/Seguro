<?php
/**
 * Description of VehiculosVac
 *
 * @author Martin
 */
class VehiculosValueObject {
    private $_idvehiculos, $_idclientes, $_patente, 
            $_motor, $_chacis, $_fechafabricacion, $_idmarcas, 
            $_idmodelos, $_version, $_idtipos, 
            $_idusos, $_naftero, $_valorasegurado;

    public function get_idvehiculos() {
        return $this->_idvehiculos;
    }

    public function get_idclientes() {
        return $this->_idclientes;
    }

    public function get_patente() {
        return $this->_patente;
    }

    public function get_motor() {
        return $this->_motor;
    }

    public function get_chacis() {
        return $this->_chacis;
    }

    public function get_fechafabricacion() {
        return $this->_fechafabricacion;
    }

    public function get_idmarcas() {
        return $this->_idmarcas;
    }

    public function get_idmodelos() {
        return $this->_idmodelos;
    }

    public function get_version() {
        return $this->_version;
    }

    public function get_idtipos() {
        return $this->_idtipos;
    }

    public function get_idusos() {
        return $this->_idusos;
    }

    public function get_naftero() {
        return $this->_naftero;
    }

    public function get_valorasegurado() {
        return $this->_valorasegurado;
    }

    public function set_idvehiculos($_idvehiculos) {
        $this->_idvehiculos = $_idvehiculos;
    }

    public function set_idclientes($_idclientes) {
        $this->_idclientes = $_idclientes;
    }

    public function set_patente($_patente) {
        $this->_patente = $_patente;
    }

    public function set_motor($_motor) {
        $this->_motor = $_motor;
    }

    public function set_chacis($_chacis) {
        $this->_chacis = $_chacis;
    }

    public function set_fechafabricacion($_fechafabricacion) {
        $this->_fechafabricacion = $_fechafabricacion;
    }

    public function set_idmarcas($_idmarcas) {
        $this->_idmarcas = $_idmarcas;
    }

    public function set_idmodelos($_idmodelos) {
        $this->_idmodelos = $_idmodelos;
    }

    public function set_version($_version) {
        $this->_version = $_version;
    }

    public function set_idtipos($_idtipos) {
        $this->_idtipos = $_idtipos;
    }

    public function set_idusos($_idusos) {
        $this->_idusos = $_idusos;
    }

    public function set_naftero($_naftero) {
        $this->_naftero = $_naftero;
    }

    public function set_valorasegurado($_valorasegurado) {
        $this->_valorasegurado = $_valorasegurado;
    }


}
