<?php
/**
 * Description of TelefonosValueObject
 *
 * @author ssrolanr
 */
class TelefonosValueObject {
    private $_idtelefonos, $_idclientes, $_numero;

    public function get_idtelefonos() {
        return $this->_idtelefonos;
    }

    public function get_idclientes() {
        return $this->_idclientes;
    }

    public function get_numero() {
        return $this->_numero;
    }

    public function set_idtelefonos($_idtelefonos) {
        $this->_idtelefonos = $_idtelefonos;
    }

    public function set_idclientes($_idclientes) {
        $this->_idclientes = $_idclientes;
    }

    public function set_numero($_numero) {
        $this->_numero = $_numero;
    }
}