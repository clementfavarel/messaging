<?php
include_once 'model/Db.php';
include_once 'model/User.php';

class Model
{
   public function getConn()
   {
      return Db::getInstance()->getConnection();
   }
}
