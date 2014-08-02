<?php
/**
 * Description of CondfiscalesValueObject
 *
 * @author ssrolanr
 */
class CondfiscalesValueObject {
    private $_idcondfiscales, $_descripcion;
    public function get_idcondfiscales() {
        return $this->_idcondfiscales;
    }

    public function get_descripcion() {
        return $this->_descripcion;
    }

    public function set_idcondfiscales($_idcondfiscales) {
        $this->_idcondfiscales = $_idcondfiscales;
    }

    public function set_descripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
    }
}