<?php

class AccesoriosValueObject{
    
    private $_idAccesorios, $_idVehiculos, $_nombreA, $_valor;
    
    
    public function set_idAccesorios($_idAccesorios) {
        $this->_idAccesorios = $_idAccesorios;
        return $this;
    }

    public function set_idVehiculos($_idVehiculos) {
        $this->_idVehiculos = $_idVehiculos;
        return $this;
    }

    public function set_nombreA($_nombreA) {
        $this->_nombreA = $_nombreA;
        return $this;
    }

    public function set_valor($_valor) {
        $this->_valor = $_valor;
        return $this;
    }
    public function get_idAccesorios() {
        return $this->_idAccesorios;
    }

    public function get_idVehiculos() {
        return $this->_idVehiculos;
    }

    public function get_nombreA() {
        return $this->_nombreA;
    }

    public function get_valor() {
        return $this->_valor;
    }



}