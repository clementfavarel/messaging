<?php
class User
{
   public $userId;
   public $username;
   public $userMail;
   public $userPwd;

   public function __construct($userId, $username, $userMail, $userPwd)
   {
      $this->userId = $userId;
      $this->username = $username;
      $this->userMail = $userMail;
      $this->userPwd = $userPwd;
   }

   public function create($userId, $username, $userMail, $userPwd)
   {
      $db = Db::getInstance();
      $request = $db->prepare("INSERT INTO users (userId, username, userMail, userPwd) VALUES (:userId, :username, :userMail, :userPwd)");
      $request->execute(array(
         'userId' => $userId,
         'username' => $username,
         'userMail' => $userMail,
         'userPwd' => $userPwd
      ));
   }
}
