<?php
// Se requiere de la clase ActiveRecordAbstractFactory
require_once '../clases/ActiveRecord/ActiveRecordAbstractFactory.php';
require_once '../clases/ActiveRecord/MysqlBarriosActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlCallesActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlClientesActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlCondfiscalesActiveRecord.php';
require_once '../clases/ActiveRecord/MysqlTelefonosActiveRecord.php';
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

//   const HOST = 'mysql15.000webhost.com';
//   const USER = 'a5248503_kiosco';
//   const PASS = 'T1nch0_web';
//   const DB = 'a5248503_kiosco';
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
    * @return \MysqlUsuarioActiveRecord
    */
   public function getUsuarioActiveRecord() {
       return new MysqlUsuarioActiveRecord();
   }

}