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
}
