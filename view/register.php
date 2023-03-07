<!DOCTYPE html>
<html lang="fr">
<?php include_once 'includes/head.php'; ?>

<body>
   <div class="container">
      <form method="post" class="form" id="register-form"">
         <h1 class=" center">Inscription</h1>
         <label class="form__label" for="username">Nom d'utilisateur</label>
         <input class="form__input" type="text" name="username" id="username" placeholder="exemple01" onkeyup="checkUsername();">
         <label class="form__label" for="email">Email</label>
         <input class="form__input" type="email" name="email" id="email" placeholder="mail@exemple.com" onkeyup="checkEmail();">
         <label class="form__label" for="password">Mot de passe</label>
         <div class="password">
            <input class="form__input" type="password" name="password" id="password" placeholder="********" onkeyup="checkPassword();">
            <i class="fa-solid fa-eye" onclick="showPassword();" id="eye"></i>
            <i class="fa-solid fa-eye-slash" style="display:none" onclick="hidePassword();" id="eye-slash"></i>
         </div>
         <label class="form__label" for="confirm_password">Confirmer le mot de passe</label>
         <div class="password">
            <input class="form__input" type="password" name="confirm-password" id="confirm-password" placeholder="********" onkeyup="checkConfirmPassword();">
            <i class="fa-solid fa-eye" onclick="showConfirmPassword();" id="confirm-eye"></i>
            <i class="fa-solid fa-eye-slash" style="display:none" onclick="hideConfirmPassword();" id="confirm-eye-slash"></i>
         </div>
         <input class="form__submit" type="submit" name="submit" id="submit" value="Se connecter">
      </form>
   </div>
   <script src="controller/form.controller.js"></script>
</body>

</html>