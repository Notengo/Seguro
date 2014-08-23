<?php
/**
 * Description of ClientesValueObject
 *
 * @author ssrolanr
 */
class ClientesValueObject {
    private $_idclientes, $_apellido, $_nombre, $_idtipodocumentos, $_documento;
    private $_idcondfiscales, $_cc1, $_cc2, $_idcalles, $_altura, $_piso, $_dpto;
    private $_idbarrios, $_idlocalidad, $_cp, $_email, $_fechanacimiento;

    public function get_idclientes() {
        return $this->_idclientes;
    }

    public function get_apellido() {
        return $this->_apellido;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function get_idtipodocumentos() {
        return $this->_idtipodocumentos;
    }

    public function get_documento() {
        return $this->_documento;
    }

    public function get_idcondfiscales() {
        return $this->_idcondfiscales;
    }

    public function get_cc1() {
        return $this->_cc1;
    }

    public function get_cc2() {
        return $this->_cc2;
    }

    public function get_idcalles() {
        return $this->_idcalles;
    }

    public function get_altura() {
        return $this->_altura;
    }

    public function get_piso() {
        return $this->_piso;
    }

    public function get_dpto() {
        return $this->_dpto;
    }

    public function get_idbarrios() {
        return $this->_idbarrios;
    }

    public function get_idlocalidad() {
        return $this->_idlocalidad;
    }

    public function get_cp() {
        return $this->_cp;
    }

    public function get_email() {
        return $this->_email;
    }

    public function get_fechanacimiento() {
        return $this->_fechanacimiento;
    }

    public function set_idclientes($_idclientes) {
        $this->_idclientes = $_idclientes;
    }

    public function set_apellido($_apellido) {
        $this->_apellido = $_apellido;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function set_idtipodocumentos($_idtipodocumentos) {
        $this->_idtipodocumentos = $_idtipodocumentos;
    }

    public function set_documento($_documento) {
        $this->_documento = $_documento;
    }

    public function set_idcondfiscales($_idcondfiscales) {
        $this->_idcondfiscales = $_idcondfiscales;
    }

    public function set_cc1($_cc1) {
        $this->_cc1 = $_cc1;
    }

    public function set_cc2($_cc2) {
        $this->_cc2 = $_cc2;
    }

    public function set_idcalles($_idcalles) {
        $this->_idcalles = $_idcalles;
    }

    public function set_altura($_altura) {
        $this->_altura = $_altura;
    }

    public function set_piso($_piso) {
        $this->_piso = $_piso;
    }

    public function set_dpto($_dpto) {
        $this->_dpto = $_dpto;
    }

    public function set_idbarrios($_idbarrios) {
        $this->_idbarrios = $_idbarrios;
    }

    public function set_idlocalidad($_idlocalidad) {
        $this->_idlocalidad = $_idlocalidad;
    }

    public function set_cp($_cp) {
        $this->_cp = $_cp;
    }

    public function set_email($_email) {
        $this->_email = $_email;
    }

    public function set_fechanacimiento($_fechanacimiento) {
        $this->_fechanacimiento = $_fechanacimiento;
    }
}