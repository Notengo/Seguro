<?php

include_once 'ActiveRecordAbstractFactory.php';
include_once '../clases/ValueObject/UsuarioCompaniaValueObject.php';

class MysqlUsuarioCompaniaActiveRecord implements ActiveRecord {

    /**
     * 
     * @param UsuarioCompaniaValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {

        $sql = "UPDATE usuariocompania SET nroProductor='" . $oValueObject->get_nroProductor() . "'
            WHERE idUsuario=" . $oValueObject->get_idUsuario() . " 
                AND idcompanias=" . $oValueObject->get_idCompania() . "
AND idUsuarioCom=" . $oValueObject->get_idUsuarioCom() . "";
        if (mysql_query($sql)or die(false)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 
     * @param UsuarioCompaniaValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {

        $sql = "UPDATE usuariocompania SET baja=0 WHERE idUsuario=" . $oValueObject->get_idUsuario() . " AND idcompanias=" . $oValueObject->get_idCompania() . "";
        if (mysql_query($sql) or die(false))
            return true;
        else
            return false;
    }

    /**
     * 
     * @param UsuarioCompaniaValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM usuariocompania WHERE idUsuario=" . $oValueObject->get_idUsuario() . " AND baja = 1";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $relacion = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new UsuarioCompaniaValueObject();
                $oValueObject->set_idUsuarioCom($fila->idUsuarioCom);
                $oValueObject->set_idUsuario($fila->idUsuario);
                $oValueObject->set_idCompania($fila->idcompanias);
                $oValueObject->set_nroProductor($fila->nroProductor);
                $relacion[] = $oValueObject;
                unset($oValueObject);
            }
            return $relacion;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param UsuarioCompaniaValueObject $oValueObject
     * @return boolean
     */
    public function buscar4($oValueObject) {

        $sql = "SELECT * FROM usuariocompania WHERE idUsuario=" . $oValueObject->get_idUsuario() . " AND baja = 1";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $relacion = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new UsuarioCompaniaValueObject();
                $oValueObject->set_idUsuarioCom($fila->idUsuarioCom);
                $oValueObject->set_idUsuario($fila->idUsuario);
                $oValueObject->set_idCompania($fila->idcompanias);
                $oValueObject->set_nroProductor($fila->nroProductor);
                $relacion[] = $oValueObject;
                unset($oValueObject);
            }
            return $relacion;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param UsuarioCompaniaValueObject $oValueObject
     * @return boolean
     */
    public function buscar3($oValueObject) {
        $sql = "SELECT * FROM usuariocompania WHERE idUsuario=" . $oValueObject->get_idUsuario() . " AND idcompanias=" . $oValueObject->get_idCompania() . " AND baja = 1";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $relacion = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new UsuarioCompaniaValueObject();
                $oValueObject->set_idUsuarioCom($fila->idUsuarioCom);
                $oValueObject->set_idUsuario($fila->idUsuario);
                $oValueObject->set_idCompania($fila->idcompanias);
                $oValueObject->set_nroProductor($fila->nroProductor);
                $relacion[] = $oValueObject;
                unset($oValueObject);
            }
            return $relacion;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param UsuarioCompaniaValueObject $oValueObject
     * @return boolean
     */
    public function buscar2($oValueObject) {
        $sql = "SELECT * FROM usuariocompania WHERE idUsuario = "
                . $oValueObject->get_idUsuario()
                . " AND idcompanias = "
                . $oValueObject->get_idCompania()
                . " AND baja = 1;";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $relacion = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new UsuarioCompaniaValueObject();
                $oValueObject->set_idUsuarioCom($fila->idUsuarioCom);
                $oValueObject->set_idUsuario($fila->idUsuario);
                $oValueObject->set_idCompania($fila->idcompanias);
                $oValueObject->set_nroProductor($fila->nroProductor);
                $relacion[] = $oValueObject;
                unset($oValueObject);
            }
            return $relacion;
        } else {
            return FALSE;
        }
    }

    /**
     * 
     * @param UsuarioCompaniaValueObject $oValueObject
     * @return boolean
     */
    public function buscarTodo() {
        $sql = "SELECT * FROM usuariocompania WHERE baja = 1;";
        $resultado = mysql_query($sql) or die(false);
        if ($resultado) {
            $relacion = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new UsuarioCompaniaValueObject();
                $oValueObject->set_idUsuarioCom($fila->idUsuarioCom);
                $oValueObject->set_idUsuario($fila->idUsuario);
                $oValueObject->set_idCompania($fila->idcompanias);
                $oValueObject->set_nroProductor($fila->nroProductor);
                $relacion[] = $oValueObject;
                unset($oValueObject);
            }
            return $relacion;
        } else {
            return FALSE;
        }
    }

    public function contar() {
        
    }

    public function existe($oValueObject) {
        
    }

    /**
     * 
     * @param UsuarioCompaniaValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO usuariocompania (idUsuario,idcompanias,nroProductor,baja) "
                . "VALUES('" . $oValueObject->get_idUsuario() . "','" . $oValueObject->get_idCompania() . "','" . $oValueObject->get_nroProductor() . "',1)";

        if (mysql_query($sql)or die(false)) {
            return true;
        } else {
            return false;
        }
    }

}
