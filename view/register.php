<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
if (isset($_SESSION['user'])) {
   header('Location: index.php?home');
}
include 'view/include/head.php';
?>

<head>
   <!-- FONTAWESOME -->
   <script defer src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="view/styles/auth.css">
</head>

<body>
   <div class="card">
      <h1>Inscription</h1>
      <form method="post" class="form" id="register_form">
         <div class="input-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" autocomplete="username" onkeyup="checkUsername()" required>
            <p style="display: none;" class="error-msg" id="username_error"></p>
         </div>
         <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="mail@exemple.com" autocomplete="email" onkeyup="checkEmail()" required>
            <p style="display: none" class="error-msg" id="email_error"></p>
         </div>
         <div class="input-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" onkeyup="checkPassword()" required>
            <p style="display: none" class="error-msg" id="password_error"></p>
         </div>
         <div class="input-group">
            <label for="password_confirm">Confirmer le mot de passe</label>
            <input type="password" name="password_confirm" id="password_confirm" onkeyup="checkConfirmPassword()" required>
            <p style="display: none" class="error-msg" id="password_confirm_error"></p>
         </div>
         <div class="input-group">
            <button type="submit" name="submit" class="btn" id="submit">S'inscrire</button>
         </div>
      </form>
      <a href="?login">Déjà inscrit ? Connectez-vous !</a>
   </div>

   <script src="view/scripts/register.js"></script>
</body>

</html>