<!DOCTYPE html>
<html lang="fr">
<?php include_once 'includes/head.php'; ?>

<body>
   <div class="container">
      <form method="post" class="form" id="login-form">
         <h1 class="center">Connexion</h1>
         <label class="form__label" for="email">Email</label>
         <input class="form__input" type="email" name="email" id="email" placeholder="mail@exemple.com" onkeyup="checkEmail();">
         <label class="form__label" for="password">Mot de passe</label>
         <div class="password">
            <input class="form__input" type="password" name="password" id="password" placeholder="********" onkeyup="checkPassword();">
            <i class="fa-solid fa-eye" onclick="showPassword();" id="eye"></i>
            <i class="fa-solid fa-eye-slash" style="display:none" onclick="hidePassword();" id="eye-slash"></i>
         </div>
         <input class="form__submit" type="submit" name="submit" id="submit" value="Se connecter">
      </form>
   </div>
   <script src="controller/form.controller.js"></script>
</body>

</html>