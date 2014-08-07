<?php
include_once 'ActiveRecordAbstractFactory.php';
//include_once '../ValueObject/ClientesValueObject.php';
include_once '../clases/ValueObject/ClientesValueObject.php';

/**
 * Description of ClientesActiveRecord
 *
 * @author ssrolanr
 */
class MysqlClientesActiveRecord implements ActiveRecord{
    /**
     * 
     * @param ClientesValueObject $oValueObject
     * @return boolean
     */
    public function actualizar($oValueObject) {
        $sql = "UPDATE clientes SET apellido = '" . $oValueObject->get_apellido()
                . "', nombre = '" . $oValueObject->get_nombre()
                . "', idtipodocumentos = " . $oValueObject->get_idtipodocumentos()
                . ", documento = " . $oValueObject->get_documento()
                . ", idcondfiscales = " . $oValueObject->get_idcondfiscales()
                . ", cc = " . $oValueObject->get_cc()
                . ", idcalles = " . $oValueObject->get_idcalles()
                . ", altura = " . $oValueObject->get_altura()
                . ", piso = " . $oValueObject->get_piso()
                . ", dpto = '" . $oValueObject->get_dpto()
                . "', idbarrios = " . $oValueObject->get_idbarrios()
                . ", idlocalidad = " . $oValueObject->get_idlocalidad()
                . ", cp = '" . $oValueObject->get_cp()
                . "', email = '" . $oValueObject->get_email()
                . "', fechanacimiento = '" . $oValueObject->get_fechanacimiento()
                . "' WHERE idclientes = " . $oValueObject->get_idclientes() . ";" ;
        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function borrar($oValueObject) {
        $sql = "UPDATE clientes SET baja = DATE_FORMAT(NOW(), '%Y-%m-%d')"
                . " WHERE idclientes = " . $oValueObject->get_idclientes() . ";" ;
        if (mysql_query($sql) or die(false)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * 
     * @param ClientesValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql = "SELECT * FROM clientes WHERE ";
        if($oValueObject->get_idclientes() != ''){
            $sql .= "idclientes = " . $oValueObject->get_idclientes() . ";" ;
        } elseif($oValueObject->get_documento() != ''){
            $sql .= "documento = " . $oValueObject->get_documento() . ";" ;
        } elseif($oValueObject->get_apellido() != ''){
            $sql .= "apellido = " . $oValueObject->get_apellido() . ";" ;
        } elseif($oValueObject->get_nombre() != ''){
            $sql .= "nombre = " . $oValueObject->get_nombre() . ";" ;
        }
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $fila = mysql_fetch_object($resultado);
            $oValueObject->set_altura($fila->altura) ;
            $oValueObject->set_apellido($fila->apellido) ;
            $oValueObject->set_cc($fila->cc) ;
            $oValueObject->set_cp($fila->cp) ;
            $oValueObject->set_documento($fila->documento) ;
            $oValueObject->set_dpto($fila->dpto) ;
            $oValueObject->set_email($fila->email) ;
            $oValueObject->set_fechanacimiento($fila->fechanacimiento) ;
            $oValueObject->set_idbarrios($fila->idbarrios) ;
            $oValueObject->set_idcalles($fila->idcalles) ;
            $oValueObject->set_idclientes($fila->idclientes) ;
            $oValueObject->set_idcondfiscales($fila->idcondfiscales) ;
            $oValueObject->set_idlocalidad($fila->idlocalidad) ;
            $oValueObject->set_idtipodocumentos($fila->idtipodocumentos) ;
            $oValueObject->set_nombre($fila->nombre) ;
            $oValueObject->set_piso($fila->piso) ;
            return $oValueObject;
        } else {
            return FALSE;
        }
    }

    public function buscarTodo() {
//        $sql = "SELECT * FROM clientes WHERE idclientes = " . $oValueObject->get_idclientes() . ";" ;
        $sql = "SELECT * FROM clientes WHERE baja IS NULL OR baja = '0000-00-00';" ;
        $resultado = mysql_query($sql) or die(false);
        if($resultado){
            $aClientes = array();
            while ($fila = mysql_fetch_object($resultado)) {
                $oValueObject = new ClientesValueObject();
                $oValueObject->set_altura($fila->altura) ;
                $oValueObject->set_apellido($fila->apellido) ;
                $oValueObject->set_cc($fila->cc);
                $oValueObject->set_cp($fila->cp) ;
                $oValueObject->set_documento($fila->documento) ;
                $oValueObject->set_dpto($fila->dpto) ;
                $oValueObject->set_email($fila->email) ;
                $oValueObject->set_fechanacimiento($fila->fechanacimiento) ;
                $oValueObject->set_idbarrios($fila->idbarrios) ;
                $oValueObject->set_idcalles($fila->idcalles) ;
                $oValueObject->set_idclientes($fila->idclientes) ;
                $oValueObject->set_idcondfiscales($fila->idcondfiscales) ;
                $oValueObject->set_idlocalidad($fila->idlocalidad) ;
                $oValueObject->set_idtipodocumentos($fila->idtipodocumentos) ;
                $oValueObject->set_nombre($fila->nombre) ;
                $oValueObject->set_piso($fila->piso) ;
                $aClientes[] = $oValueObject;
                unset($oValueObject);
            }
            return $aClientes;
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
     * @param ClientesValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql = "INSERT INTO clientes (apellido, nombre, idtipodocumentos, "
                . "documento, idcondfiscales, cc, idcalles, altura, piso, "
                . "dpto, idbarrios, idlocalidad, cp, email, fechanacimiento) "
                . "VALUES ('"
                . $oValueObject->get_apellido() . "', '" . $oValueObject->get_nombre() . "', "
                . $oValueObject->get_idtipodocumentos() . ", " . $oValueObject->get_documento() . ", " 
                . $oValueObject->get_idcondfiscales() . ", '" . $oValueObject->get_cc() . "', "
                . $oValueObject->get_idcalles() . ", " . $oValueObject->get_altura(). ", ";
        if($oValueObject->get_piso()){
            $sql .= $oValueObject->get_piso() . ", '";
        } else {
            $sql .= "NULL, '";
        } 
        $sql .= $oValueObject->get_dpto() . "', "
                . $oValueObject->get_idbarrios() . ", " . $oValueObject->get_idlocalidad() . ", '"
                . $oValueObject->get_cp() . "', '" . $oValueObject->get_email() . "', '"
                . $oValueObject->get_fechanacimiento() . "');";
//        if (mysql_query($sql) or die(false)) {
        if (mysql_query($sql)) {
            $result = mysql_query("SELECT DISTINCT LAST_INSERT_ID() FROM calles");
            $id = mysql_fetch_array($result);
            if($id[0]<>0) {
                $oValueObject->set_idclientes($id[0]);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
