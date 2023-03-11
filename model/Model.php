<?php
include 'model/Db.php';

class Model
{
   public function getConnection()
   {
      return Db::getInstance()->getConnection();
   }
}
