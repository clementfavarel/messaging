<?php
class User
{
   public $userId;
   public $username;
   public $userMail;
   public $userPassword;

   public function __construct($userId, $username, $userMail, $userPassword)
   {
      $this->userId = $userId;
      $this->username = $username;
      $this->userMail = $userMail;
      $this->userPassword = $userPassword;
   }

   public static function create($username, $userMail, $userPassword)
   {
      $db = Db::getInstance();
      $request = $db->prepare("INSERT INTO users (username, userMail, userPassword) VALUES (:username, :userMail, :userPassword)");
      $request->execute(array(
         'username' => $username,
         'userMail' => $userMail,
         'userPassword' => $userPassword
      ));
   }
}
