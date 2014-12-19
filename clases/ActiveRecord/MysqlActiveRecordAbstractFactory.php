<?php
// Se requiere de la clase ActiveRecordAbstractFactory
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';

require_once '../clases/ActiveRecord/MysqlAccesorioActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlBarriosActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlCallesActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlClientesActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlCilindrosActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlCondfiscalesActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlCoberturasActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlCuotasActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlCompaniasActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlOtrosRiesgosActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlPlanillasActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlFormasPagoActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlGncActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlImagenesActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlLocalidadesActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlMarcasActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlModelosActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlPolizasActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlTelefonosActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlTiposActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlUsosActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlUsuarioActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlUsuarioCompaniaActiveRecord.php';

require_once '../clases/ActiveRecord/MysqlVehiculosActiveRecord.php';

/**
 * Clase que nos permite conectar al motor MySQL y crear objetos
 * de tipo Active Record para cada una de tablas del sistema.
 *
 * Clase que nos permite conectar al motor MySQL y crear objetos
 * de tipo Active Record para cada una de tablas del sistema.
 * @version    1.0
 * @author Martin Remedi <remedi.martin@gmail.com>
 * @license http://www.gnu.org/licenses/ GPL License
 * @copyright (c) 2013, Martin Remedi
 */
class MysqlActiveRecordAbstractFactory extends ActiveRecordAbstractFactory {

    public static function getActiveRecordFactory($motor = self::MYSQL) {
        return parent::getActiveRecordFactory($motor);
    }

//    const HOST = "localhost";
//    const USER = "aduepasc_seguro";
//    const DB = "aduepasc_seguro";
//    const PASS = "4du3p4s_s3gur0";

    const HOST = 'localhost';
    const USER = 'root';
    const PASS = 'root';
    const DB = 'seguro';

    /**
     * Nos permite conectar al motor MySQL con los datos de
     * conexión especificados como constantes. Luego se hace
     * la selección de la base de datos.
     */
    public function conectar() {
        mysql_connect(self::HOST, self::USER, self::PASS);
//        mysql_connect(self::HOST, self::USER);
        mysql_select_db(self::DB);
    }

    /**
     * 
     * @return \MysqlBarriosActiveRecord
     */
    public function getBarriosActiveRecord() {
        return new MysqlBarriosActiveRecord();
    }

    /**
     * 
     * @return \MysqlCallesActiveRecord
     */
    public function getCallesActiveRecord() {
        return new MysqlCallesActiveRecord();
    }

    /**
     * 
     * @return \MysqlClientesActiveRecord
     */
    public function getClientesActiveRecord() {
        return new MysqlClientesActiveRecord();
    }

    /**
     * 
     * @return \MysqlCilindrosActiveRecord
     */
    public function getCilindrosActiveRecord() {
        return new MysqlCilindrosActiveRecord();
    }

    /**
     * 
     * @return \MysqlCondfiscalesActiveRecord
     */
    public function getCondfiscalesActiveRecord() {
        return new MysqlCondfiscalesActiveRecord();
    }

    /**
     * @return MysqlCoberturasActiveRecord
     */
    public function getCoberturasActiveRecord() {
        return new MysqlCoberturasActiveRecord();
    }

    /**
     * @return MysqlCuotasActiveRecord
     */
    public function getCuotaActiveRecord() {
        return new MysqlCuotasActiveRecord();
    }

    /**
     * 
     * @return \MysqlTelefonosActiveRecord
     */
    public function getTelefonosActiveRecord() {
        return new MysqlTelefonosActiveRecord();
    }

    /**
     * 
     * @return \MysqlTiposActiveRecord
     */
    public function getTiposActiveRecord() {
        return new MysqlTiposActiveRecord();
    }

    /**
     * 
     * @return \MysqlUsuarioActiveRecord
     */
    public function getUsuarioActiveRecord() {
        return new MysqlUsuarioActiveRecord();
    }

    /**
     * 
     * @return \MysqlLocalidadesActiveRecord
     */
    public function getLocalidadesActiveRecord() {
        return new MysqlLocalidadesActiveRecord();
    }

    /**
     * 
     * @return \MysqlGncActiveRecord
     */
    public function getGncActiveRecord() {
        return new MysqlGncActiveRecord();
    }

    /**
     * 
     * @return \MysqlImagenesActiveRecord
     */
    public function getImagenesActiveRecord() {
        return new MysqlImagenesActiveRecord();
    }

    /**
     * 
     * @return \MysqlMarcasActiveRecord
     */
    public function getMarcasActiveRecord() {
        return new MysqlMarcasActiveRecord();
    }

    /**
     * @return MysqlPolizasActiveRecord
     */
    public function getPolizaActiveRecord() {
        return new MysqlPolizasActiveRecord();
    }

    /**
     * 
     * @return \MysqlModelosActiveRecord
     */
    public function getModelosActiveRecord() {
        return new MysqlModelosActiveRecord();
    }

    /**
     * 
     * @return \MysqlUsosActiveRecord
     */
    public function getUsosActiveRecord() {
        return new MysqlUsosActiveRecord();
    }

    /**
     * 
     * @return MysqlVehiculosActiveRecord
     */
    public function getVehiculoActiveRecord() {
        return new MysqlVehiculosActiveRecord();
    }

    /**
     * @return MysqlCompaniasActiveRecord
     * 
     */
    public function getCompaniaActiveRecord() {
        return new MysqlCompaniasActiveRecord();
    }

    /**
     * 
     * @return \MysqlOtrosRiesgosActiveRecord
     */
    public function getOtrosRiesgosActiveRecord() {
        return new MysqlOtrosRiesgosActiveRecord();
    }

    /**
     * 
     * @return \MysqlPlanillasActiveRecord
     */
    public function getPlanillaActiveRecord() {
        return new MysqlPlanillasActiveRecord();
    }

    /**
     * 
     * @return MysqlFormasPagoActiveRecord
     */
    public function getFormasPagoActiveRecord() {
        return new MysqlFormasPagoActiveRecord();
    }

    /**
     * 
     * @return MysqlAccesoriosActiveRecord
     */
    public function getAccesoriosActiveRecord() {
        return new MysqlAccesorioActiveRecord();
    }

    /**
     * 
     * @return MysqlUsuarioCompaniaActiveRecord
     */
    public function getUsuarioCompaniaActiveRecord() {
        return new MysqlUsuarioCompaniaActiveRecord();
    }

    
}
