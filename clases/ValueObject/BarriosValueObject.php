<?php
/**
 * Description of barriosValueObject
 *
 * @author Martin
 */
class BarriosValueObject {
    private $_idbarrios, $_nombre;
    public function get_idbarrios() {
        return $this->_idbarrios;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function set_idbarrios($_idbarrios) {
        $this->_idbarrios = $_idbarrios;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }
}