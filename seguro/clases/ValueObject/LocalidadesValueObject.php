<?php
/**
 * Description of LocalidadesValueObject
 *
 * @author Martin
 */
class LocalidadesValueObject {
    private $_idlocalidades, $_id_provincia, $_localidad;

    public function get_idlocalidades() {
        return $this->_idlocalidades;
    }

    public function get_id_provincia() {
        return $this->_id_provincia;
    }

    public function get_localidad() {
        return $this->_localidad;
    }

    public function set_idlocalidades($_idlocalidades) {
        $this->_idlocalidades = $_idlocalidades;
    }

    public function set_id_provincia($_id_provincia) {
        $this->_id_provincia = $_id_provincia;
    }

    public function set_localidad($_localidad) {
        $this->_localidad = $_localidad;
    }
}