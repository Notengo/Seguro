<?php

/**
 * Description of CoberturasValueObject
 *
 * @author Escritorio
 */
class CoberturasValueObject {

    private $_idcoberturas, $_nombre, $_codigo, $_descripcion;

    public function get_idcoberturas() {
        return $this->_idcoberturas;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function get_codigo() {
        return $this->_codigo;
    }

    public function get_descripcion() {
        return $this->_descripcion;
    }

    public function set_idcoberturas($_idcoberturas) {
        $this->_idcoberturas = $_idcoberturas;
        return $this;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
        return $this;
    }

    public function set_codigo($_codigo) {
        $this->_codigo = $_codigo;
        return $this;
    }

    public function set_descripcion($_descripcion) {
        $this->_descripcion = $_descripcion;
        return $this;
    }

}
