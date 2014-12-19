<?php

// Se requiere la clase MysqlActiveRecordAbstractFactory.php
require_once "MysqlActiveRecordAbstractFactory.php";

/**
 * Clase que fabrica objetos de tipo Active Record.
 *
 * Clase que fabrica objetos de tipo Active Record para motores MySQL y PostgreSQL.
 *
 * @copyright  Copyright (c) 2014, Martin Remedi
 * @license    http://www.gnu.org/licenses/   GPL License
 * @version    1.0
 * @since      Class available since Release 1.0
 */
abstract class ActiveRecordAbstractFactory {

    // Lista de tipos de Active Record soportados por la factoria
    const MYSQL = 1;
    const PGSQL = 2;

    public abstract function getAccesoriosActiveRecord();

    public abstract function getBarriosActiveRecord();

    public abstract function getCallesActiveRecord();

    public abstract function getClientesActiveRecord();

    public abstract function getCilindrosActiveRecord();

    public abstract function getCondfiscalesActiveRecord();

    public abstract function getCoberturasActiveRecord();

    public abstract function getCuotaActiveRecord();

    public abstract function getCompaniaActiveRecord();

    public abstract function getGncActiveRecord();

    public abstract function getImagenesActiveRecord();

    public abstract function getLocalidadesActiveRecord();

    public abstract function getMarcasActiveRecord();

    public abstract function getModelosActiveRecord();

    public abstract function getOtrosRiesgosActiveRecord();

    public abstract function getFormasPagoActiveRecord();

    public abstract function getPlanillaActiveRecord();

    public abstract function getPolizaActiveRecord();

    public abstract function getTelefonosActiveRecord();

    public abstract function getTiposActiveRecord();

    public abstract function getUsosActiveRecord();

    public abstract function getUsuarioActiveRecord();
    
    public abstract function getUsuarioCompaniaActiveRecord();

    public abstract function getVehiculoActiveRecord();

    /**
     * Permite obtener la factoria de un Active Record.
     * 
     * @param integer $motor Se especifica el tipo de objeto a crear
     * @return object or false
     */
    public static function getActiveRecordFactory($motor = self::MYSQL) {
        switch ($motor) {
            case self::MYSQL:
                return new MysqlActiveRecordAbstractFactory();
            case self::PGSQL:
                return new PgsqlActiveRecordAbstractFactory();
            default:
                return false;
        }
    }

}
