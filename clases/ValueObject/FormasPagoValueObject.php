<?php

/**
 * Description of FormasPagoValueObject
 *
 * @author Martin
 */
class FormasPagoValueObject {

    private $_idformaspago, $_descripcion;

    function get_idformaspago() {
        return $this->_idformaspago;
    }

    function get_descripcion() {
        return $this->_descripcion;
    }

    function set_idformaspago($_idformaspago) {
        $this->_idformaspago = $_idformaspago;
        return $this;
    }

    function set_descripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
        return $this;
    }

}
