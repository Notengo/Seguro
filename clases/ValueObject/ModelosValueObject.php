<?php
/**
 * Description of ModelosValueObject
 *
 * @author ssrolanr
 */
class ModelosValueObject {
    private $_idmodelos, $_idmarcas, $_descripcion;

    public function get_idmodelos() {
        return $this->_idmodelos;
    }

    public function get_idmarcas() {
        return $this->_idmarcas;
    }

    public function get_descripcion() {
        return $this->_descripcion;
    }

    public function set_idmodelos($_idmodelos) {
        $this->_idmodelos = $_idmodelos;
    }

    public function set_idmarcas($_idmarcas) {
        $this->_idmarcas = $_idmarcas;
    }

    public function set_descripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
    }
}