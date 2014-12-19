<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioCompaniaValueObject{
    
    private $_idUsuarioCom, $_idUsuario, $_idCompania, $_nroProductor;
    
    public function set_idUsuarioCom($_idUsuarioCom) {
        $this->_idUsuarioCom = $_idUsuarioCom;
        
    }

    public function set_idUsuario($_idUsuario) {
        $this->_idUsuario = $_idUsuario;
        
    }

    public function set_idCompania($_idCompania) {
        $this->_idCompania = $_idCompania;
       
    }

    public function set_nroProductor($_nroProductor) {
        $this->_nroProductor = $_nroProductor;
        
    }

    public function get_idUsuarioCom() {
        return $this->_idUsuarioCom;
    }

    public function get_idUsuario() {
        return $this->_idUsuario;
    }

    public function get_idCompania() {
        return $this->_idCompania;
    }

    public function get_nroProductor() {
        return $this->_nroProductor;
    }


}