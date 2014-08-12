<?php
/**
 * Description of UsosValueObject
 *
 * @author ssrolanr
 */
class UsosValueObject {
    private $_idusos, $_descripcion;
    
    public function get_idusos() {
        return $this->_idusos;
    }

    public function get_descripcion() {
        return $this->_descripcion;
    }

    public function set_idusos($_idusos) {
        $this->_idusos = $_idusos;
    }

    public function set_descripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
    }
}