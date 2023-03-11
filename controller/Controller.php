<?php
include 'model/Model.php';

class Controller
{
   private $model;

   // The constructor creates a new model object
   public function __construct()
   {
      $this->model = new Model();
   }

   // This method will handle requests and display the appropriate view
   public function invoke()
   {
      // Get the page name from the URL
      $page = isset(array_keys($_GET)[0]) ? array_keys($_GET)[0] : 'home';

      switch ($page) {
         case 'home':
            $currentPage = 'Accueil';
            include 'view/home.php';
            break;
         case 'login':
            $currentPage = 'Connexion';
            include 'view/login.php';
            break;
         case 'register':
            $currentPage = 'Inscription';
            include 'view/register.php';
            break;
         default:
            $currentPage = 'Erreur 404';
            include 'view/404.php';
            break;
      }
   }
}
