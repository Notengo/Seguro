<?php

/**
 * Description of CoberturasValueObject
 *
 * @author Linking informatica
 */

class CoberturasValueObject
{
    private $_codigo, $_cobertura,$_descripcion;
    
     public function get_codigo() {
        return $this->_codigo;
    }

    public function get_cobertura() {
        return $this->_cobertura;
    }
    public function get_descripcion() {
        return $this->_descripcion;
    }

    public function set_codigo($codigo) {
        $this->_codigo=$codigo;
    }

    public function set_cobertura($cobertura) {
        $this->_cobertura=$cobertura;
    }
    public function set_descripcion($descripcion) {
        $this->_descripcion=$descripcion;
    }
}