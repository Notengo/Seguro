<?php
/**
 * Description of TiposValueObject
 *
 * @author Martin
 */
class TiposValueObject {
    private $_idtipos, $_descripcion;
    
    public function get_idtipos() {
        return $this->_idtipos;
    }

    public function get_descripcion() {
        return $this->_descripcion;
    }

    public function set_idtipos($_idtipos) {
        $this->_idtipos = $_idtipos;
    }

    public function set_descripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
    }
}
