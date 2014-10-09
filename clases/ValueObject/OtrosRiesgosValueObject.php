<?php
/**
 * Description of OtrosRiesgosValueObject
 * @author Escritorio
 */
class OtrosRiesgosValueObject {
    private $_idotrosriesgos, $_nombre, $_descripcion;
    public function get_idotrosriesgos() {
        return $this->_idotrosriesgos;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function get_descripcion() {
        return $this->_decripcion;
    }

    public function set_idotrosriesgos($_idotrosriesgos) {
        $this->_idotrosriesgos = $_idotrosriesgos;
        return $this;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
        return $this;
    }

    public function set_descripcion($_decripcion) {
        $this->_decripcion = $_decripcion;
        return $this;
    }
}