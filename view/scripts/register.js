function checkUsername() {
   const username = document.getElementById('username');
   const username_error = document.getElementById('username_error');

   // if username don't match the regex, show error
   if (!username.value.match(/^[a-zA-Z0-9_]{3,20}$/)) {
      username_error.style.display = 'block';
      username_error.innerHTML = `
         <i class="fas fa-exclamation-triangle"></i>
         Veuillez saisir un nom d'utilisateur valide
      `;
      username.style.border = '1px solid red';
   } else {
      username_error.style.display = 'none';
      username.style.border = '1px solid lightgreen';
   }
}

function checkEmail() {
   const email = document.getElementById('email');
   const email_error = document.getElementById('email_error');

   // if email don't match the regex, show error
   if (!email.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
      email_error.style.display = 'block';
      email_error.innerHTML = `
         <i class="fas fa-exclamation-triangle"></i>
         Veuillez saisir une adresse email valide
      `;
      email.style.border = '1px solid red';
   } else {
      email_error.style.display = 'none';
      email.style.border = '1px solid lightgreen';
   }
}

function checkPassword() {
   const password = document.getElementById('password');
   const password_error = document.getElementById('password_error');

   // if password don't match the regex, show error
   if (!password.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/)) {
      password_error.style.display = 'block';
      password_error.innerHTML = `
         <i class="fas fa-exclamation-triangle"></i>
         Veuillez saisir un mot de passe valide et sécurisé
      `;
      password.style.border = '1px solid red';
   } else {
      password_error.style.display = 'none';
      password.style.border = '1px solid lightgreen';
   }
}

function checkConfirmPassword() {
   const password = document.getElementById('password');
   const confirmPassword = document.getElementById('password_confirm');
   const confirmPassword_error = document.getElementById('password_confirm_error');

   // if password and confirm password don't match, show error
   if (password.value !== confirmPassword.value) {
      confirmPassword_error.style.display = 'block';
      confirmPassword_error.innerHTML = `
         <i class="fas fa-exclamation-triangle"></i>
         Les mots de passe ne correspondent pas
      `;
      confirmPassword.style.border = '1px solid red';
   } else {
      confirmPassword_error.style.display = 'none';
      confirmPassword.style.border = '1px solid lightgreen';
   }
}

const form = document.getElementById('register_form');
form.addEventListener('submit', async (e) => {
   e.preventDefault();
   const username = document.getElementById('username');
   const email = document.getElementById('email');
   const password = document.getElementById('password');
   const confirmPassword = document.getElementById('password_confirm');

   // check if all fields aren't empty
   if (username.value !== '' && email.value !== '' && password.value !== '' && confirmPassword.value !== '') {
      // check if username is valid
      if (username.value.match(/^[a-zA-Z0-9_]{3,20}$/)) {
         // check if email is valid
         if (email.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/)) {
            // check if password is valid
            if (password.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/)) {
               // check if password and confirm password match
               if (password.value === confirmPassword.value) {
                  // if all fields are valid, create an object with the data
                  const user = {
                     username: username.value,
                     email: email.value,
                     password: password.value,
                  };

                  // fetch data to the php controller
                  const response = await fetch('controller/register.contr.php', {
                     method: 'POST',
                     headers: {
                        'Content-Type': 'application/json',
                     },
                     body: JSON.stringify(user),
                  });
                  const data = await response.json();
                  console.log(data);

                  if (data.success) {
                     window.location.href = './?';
                  } else if (data.error) {
                     alert(data.error)
                  } else {
                     alert('Une erreur est survenue');
                  }
               } else {
                  alert('Les mots de passe ne correspondent pas');
               }
            } else {
               alert('Veuillez saisir un mot de passe valide et sécurisé');
            }
         } else {
            alert('Veuillez saisir une adresse email valide');
         }
      } else {
         alert("Veuillez saisir un nom d'utilisateur valide");
      }
   } else {
      alert('Veuillez remplir tous les champs');
   }
});