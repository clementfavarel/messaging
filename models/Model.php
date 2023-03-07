<?php
include_once './models/Db.php';
include_once './models/User.php';

class Model
{
   public function getConn()
   {
      return Db::getInstance()->getConnection();
   }
}
