<?php

class User
{
   public $userId;
   public $username;
   public $userMail;
   public $userPassword;
   public $userStatus;

   public function __construct($userId, $username, $userMail, $userPassword, $userStatus)
   {
      $this->userId = $userId;
      $this->username = $username;
      $this->userMail = $userMail;
      $this->userPassword = $userPassword;
      $this->userStatus = $userStatus;
   }

   public static function create($username, $email, $password)
   {
      $db = Db::getInstance();
      $req = $db->prepare('INSERT INTO users (username, userMail, userPassword) VALUES (:username, :email, :password)');
      $req->execute(array(
         'username' => $username,
         'email' => $email,
         'password' => $password
      ));
   }
}
