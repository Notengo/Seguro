<?php

/**
 * Description of CilindrosValueObject
 *
 * @author Martin
 */
class CilindrosValueObject {

    private $_idcilindros, $_nro, $_marca, $_idvehiculos;

    function __construct($_nro, $_marca, $_idvehiculos) {
        $this->_nro = $_nro;
        $this->_marca = $_marca;
        $this->_idvehiculos = $_idvehiculos;
    }

    public function get_idcilindros() {
        return $this->_idcilindros;
    }

    public function get_nro() {
        return $this->_nro;
    }

    public function get_marca() {
        return $this->_marca;
    }

    public function get_idvehiculos() {
        return $this->_idvehiculos;
    }

    public function set_idcilindros($_idcilindros) {
        $this->_idcilindros = $_idcilindros;
    }

    public function set_nro($_nro) {
        $this->_nro = $_nro;
    }

    public function set_marca($_marca) {
        $this->_marca = $_marca;
    }

    public function set_idvehiculos($_idvehiculos) {
        $this->_idvehiculos = $_idvehiculos;
    }

}
