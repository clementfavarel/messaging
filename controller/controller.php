<?php
include_once 'model/Model.php';

class Controller
{
   public $model;
   private $conn;

   public function __construct()
   {
      $this->model = new Model();
   }

   public function invoke()
   {
      //routes digihub app
      $page = isset(array_keys($_GET)[0]) ? array_keys($_GET)[0] : 'home';

      $conn = $this->model->getConn();

      switch ($page) {
         case 'home':
            $currentPage = 'Accueil';
            include 'views/home.php';
            break;
         default:
            include 'views/home.php';
            break;
      }
   }
}
