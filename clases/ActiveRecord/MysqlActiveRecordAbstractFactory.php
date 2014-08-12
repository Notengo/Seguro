<?php
// Se requiere de la clase ActiveRecordAbstractFactory
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
require_once '../clases/ActiveRecord/MysqlBarriosActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlCallesActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlClientesActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlCondfiscalesActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlLocalidadesActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlMarcasActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlModelosActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlTelefonosActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlTiposActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlUsosActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlUsuarioActiveRecord.php';

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
class MysqlActiveRecordAbstractFactory extends ActiveRecordAbstractFactory
{
    
    public static function getActiveRecordFactory($motor = self::MYSQL) {
        return parent::getActiveRecordFactory($motor);
    }

//    $mysql_host = "mysql4.000webhost.com";
//    $mysql_database = "a1226679_seguro";
//    $mysql_user = "a1226679_seguro";
//    $mysql_password = "S3gur0";

//   const HOST = 'mysql4.000webhost.com';
//   const USER = 'a1226679_seguro';
//   const PASS = 'S3gur0';
//   const DB = 'a1226679_seguro';
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
    * @return \MysqlCondfiscalesActiveRecord
    */
   public function getCondfiscalesActiveRecord() {
       return new MysqlCondfiscalesActiveRecord();
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
    * @return \MysqlMarcasActiveRecord
    */
   public function getMarcasActiveRecord() {
       return new MysqlMarcasActiveRecord();
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
}