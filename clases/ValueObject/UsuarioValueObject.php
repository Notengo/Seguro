<?php

class UsuarioValueObject {
    private $_nombreUser, $_pass, $nombreReal, $_apellidoReal, $_nro, $_idUsuario;
    public function set_nombreUser($_nombreUser) {
        $this->_nombreUser = $_nombreUser;
        return $this;
    }

    public function set_pass($_pass) {
        $this->_pass = $_pass;
        return $this;
    }

    public function setNombreReal($nombreReal) {
        $this->nombreReal = $nombreReal;
        return $this;
    }

    public function set_apellidoReal($_apellidoReal) {
        $this->_apellidoReal = $_apellidoReal;
        return $this;
    }

    public function set_nro($_nro) {
        $this->_nro = $_nro;
        return $this;
    }
    public function set_idUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
        return $this;
    }

        public function get_nombreUser() {
        return $this->_nombreUser;
    }

    public function get_pass() {
        return $this->_pass;
    }

    public function getNombreReal() {
        return $this->nombreReal;
    }

    public function get_apellidoReal() {
        return $this->_apellidoReal;
    }

    public function get_nro() {
        return $this->_nro;
    }

    public function get_idUsuario() {
        return $this->_idUsuario;
    }


}

?>
