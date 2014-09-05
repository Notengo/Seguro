<?php

/**
 * Description of ImagenesValueObject
 *
 * @author ssrolanr
 */
class ImagenesValueObject {
    private $_idvehiculos, $_nro, $_foto;

    public function get_idvehiculos() {
        return $this->_idvehiculos;
    }

    public function get_nro() {
        return $this->_nro;
    }

    public function get_foto() {
        return $this->_foto;
    }

    public function set_idvehiculos($_idvehiculos) {
        $this->_idvehiculos = $_idvehiculos;
    }

    public function set_nro($_nro) {
        $this->_nro = $_nro;
    }

    public function set_foto($_foto) {
        $this->_foto = $_foto;
    }

}
