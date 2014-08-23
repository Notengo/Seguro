<?php

/**
 * Description of GncValueObject
 *
 * @author Martin
 */
class GncValueObject {

    private $_idgnc, $_regulador, $_marca, $_idvehiculos;

    public function get_idgnc() {
        return $this->_idgnc;
    }

    public function get_regulador() {
        return $this->_regulador;
    }

    public function get_marca() {
        return $this->_marca;
    }

    public function get_idvehiculos() {
        return $this->_idvehiculos;
    }

    public function set_idgnc($_idgnc) {
        $this->_idgnc = $_idgnc;
    }

    public function set_regulador($_regulador) {
        $this->_regulador = $_regulador;
    }

    public function set_marca($_marca) {
        $this->_marca = $_marca;
    }

    public function set_idvehiculos($_idvehiculos) {
        $this->_idvehiculos = $_idvehiculos;
    }
}