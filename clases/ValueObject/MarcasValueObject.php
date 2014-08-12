<?php
/**
 * Description of MarcasValueObject
 *
 * @author ssrolanr
 */
class MarcasValueObject {
    private $_idmarcas, $_descripcion;
    
    public function get_idmarcas() {
        return $this->_idmarcas;
    }

    public function get_descripcion() {
        return $this->_descripcion;
    }

    public function set_idmarcas($_idmarcas) {
        $this->_idmarcas = $_idmarcas;
    }

    public function set_descripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
    }
}
