<?php
class Db
{
   private static $instance = null;
   private $connection;

   // Database connection parameters
   private $host = 'localhost';
   private $dbname = 'messaging';
   private $username = 'root';
   private $password = '';

   private function __construct()
   {
      try {
         $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->connection->exec("SET NAMES 'utf8'");
      } catch (PDOException $error) {
         echo 'Connection error: ' . $error->getMessage();
      }
   }

   public static function getInstance()
   {
      if (self::$instance == null) {
         self::$instance = new Db();
      }

      return self::$instance;
   }

   public function getConnection()
   {
      return $this->connection;
   }
}
