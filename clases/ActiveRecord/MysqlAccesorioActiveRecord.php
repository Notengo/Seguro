<?php

include_once 'activeRecordInterface.php';
include_once '../clases/ValueObject/AccesoriosValueObject.php';

class MysqlAccesorioActiveRecord implements ActiveRecord{
    
    /**
     * 
     * @param AccesoriosValueObject $oValueObject
     * @return boolean
     */
    
    public function actualizar($oValueObject) {
        $sql="UPDATE accesorios SET nombre='".$oValueObject->get_nombreA()."',valor=".$oValueObject->get_valor().""
                . " WHERE idAccesorios=".$oValueObject->get_idAccesorios()."";
        if(mysql_query($sql)or die(false))
        {
            return true;
        }else{return false;}
    }

    /**
     * 
     * @param AccesoriosValueObject $oValueObject
     * @return boolean
     */
    public function borrar($oValueObject) {
        
        $sql="delete from accesorios where idAccesorios=".$oValueObject->get_idAccesorios()."";
        if(mysql_query($sql)or die(false))
        {
            return true;
        }else{return false;}
    }
    
    /**
     * 
     * @param AccesoriosValueObject $oValueObject
     * @return boolean
     */
    public function buscar($oValueObject) {
        $sql="SELECT * FROM accesorios WHERE idvehiculos=".$oValueObject->get_idVehiculos()."";
        $valores = mysql_query($sql)or die(false);
        if($valores)
        {
         $aAccesorio = array();   
         while($fila = mysql_fetch_object($valores))
         {$oValueObject = new AccesoriosValueObject;        
         $oValueObject->set_idAccesorios($fila->idAccesorios);
         $oValueObject->set_idVehiculos($fila->idvehiculos);
         $oValueObject->set_nombreA($fila->nombre);
         $oValueObject->set_valor($fila->valor);
         $aAccesorio[] = $oValueObject;
         unset($oValueObject);   
         }
         return $aAccesorio;
        }
        else{
        return false;}
    }

    public function buscarTodo() {
        
    }

    public function contar() {
        
    }

    public function existe($oValueObject) {
        
    }
    
    
    /**
     * 
     * @param AccesoriosValueObject $oValueObject
     * @return boolean
     */
    public function guardar($oValueObject) {
        $sql="INSERT INTO accesorios "
                . "(idvehiculos,nombre,valor) VALUES "
                . "(".$oValueObject->get_idVehiculos().",'".$oValueObject->get_nombreA()."',".$oValueObject->get_valor().")";
        
        $valores = mysql_query($sql);
        if($valores)
        {
            return TRUE;
        }else{return FALSE;}
    }

}
