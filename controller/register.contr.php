<?php
include '../model/Db.php';
include '../model/User.php';

$body = file_get_contents('php://input');
$body = json_decode($body, true);

$username = $body['username'];
$email = $body['email'];
$password = $body['password'];
$password_confirm = $body['confirmPassword'];

// check if data aren't empty
if (!empty($username) && !empty($email) && !empty($password) && !empty($password_confirm)) {
   // check if email is valid
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // check if password match the pattern
      if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
         // check if password and password_confirm are the same
         if ($password === $password_confirm) {
            // check if username is already taken
            $result = Db::quickFetch('users', 'username', $username);
            if (empty($result)) {
               // hash the password
               $password = password_hash($password, PASSWORD_DEFAULT);
               // insert the user in the database
               User::create($username, $email, $password);
               // start the session and store the userFirstname in it
               session_start();
               // store userId in the session
               $_SESSION['userId'] = $result['userId'];
               // return a success message
               $body = array('success' => 'inscription réussie.');
            } else {
               $body = array('error' => 'le nom d\'utilisateur est déjà pris.');
            }
         } else {
            $body = array('error' => 'les mots de passe ne correspondent pas.');
         }
      } else {
         $body = array('error' => 'le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.');
      }
   } else {
      $body = array('error' => 'l\'adresse email n\'est pas valide.');
   }
} else {
   $body = array('error' => 'veuillez remplir tous les champs.');
}

echo json_encode($body);
