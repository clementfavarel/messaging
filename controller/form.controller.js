function checkUsername() {
   const username = document.getElementById('username');
   const submit = document.getElementById('submit');

   // if username don't match the pattern
   if (!username.value.match(/^[a-zA-Z0-9._-]{3,20}$/)) {
      username.classList.add('error');
      submit.classList.add('disabled');
   } else {
      username.classList.remove('error');
      submit.classList.remove('disabled');
   }
}

function checkEmail() {
   const email = document.getElementById('email');
   const submit = document.getElementById('submit');

   // if email don't match the pattern
   if (!email.value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
      email.classList.add('error');
      submit.classList.add('disabled');
   } else {
      email.classList.remove('error');
      submit.classList.remove('disabled');
   }
}

function checkPassword() {
   const password = document.getElementById('password');
   const submit = document.getElementById('submit');

   // if password don't match pattern
   if (!password.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/)) {
      password.classList.add('error');
      submit.classList.add('disabled');
   } else {
      password.classList.remove('error');
      submit.classList.remove('disabled');
   }
}

function checkConfirmPassword() {
   const confirm_password = document.getElementById('confirm-password');
   const submit = document.getElementById('submit');

   // if password don't match pattern
   if (!confirm_password.value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/)) {
      confirm_password.classList.add('error');
      submit.classList.add('disabled');
   } else {
      confirm_password.classList.remove('error');
      submit.classList.remove('disabled');
   }
}

function showPassword() {
   const eye = document.getElementById('eye');
   const eye_slash = document.getElementById('eye-slash');
   const password = document.getElementById('password');

   if (password.type === 'password') {
      password.type = 'text';
      eye.style.display = 'none';
      eye_slash.style.display = 'block';
   }
}

function hidePassword() {
   const eye = document.getElementById('eye');
   const eye_slash = document.getElementById('eye-slash');
   const password = document.getElementById('password');

   if (password.type === 'text') {
      password.type = 'password';
      eye.style.display = 'block';
      eye_slash.style.display = 'none';
   }
}

function showConfirmPassword() {
   const confirm_eye = document.getElementById('confirm-eye');
   const confirm_eye_slash = document.getElementById('confirm-eye-slash');
   const confirm_password = document.getElementById('confirm-password');

   if (confirm_password.type === 'password') {
      confirm_password.type = 'text';
      confirm_eye.style.display = 'none';
      confirm_eye_slash.style.display = 'block';
   }
}

function hideConfirmPassword() {
   const confirm_eye = document.getElementById('confirm-eye');
   const confirm_eye_slash = document.getElementById('confirm-eye-slash');
   const confirm_password = document.getElementById('confirm-password');

   if (confirm_password.type === 'text') {
      confirm_password.type = 'password';
      confirm_eye.style.display = 'block';
      confirm_eye_slash.style.display = 'none';
   }
}

if (document.getElementById('register-form')) {
   const register_form = document.getElementById('register-form');
   register_form.addEventListener('submit', async (event) => {
      event.preventDefault();

      const username = document.getElementById('username').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirm_password = document.getElementById('confirm-password').value;

      if (username !== '' && email !== '' && password !== '' && confirm_password !== '') {
         if (email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)) {
            if (password.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/)) {
               if (password === confirm_password) {

                  const formData = {
                     username,
                     email,
                     password,
                     confirm_password
                  }

                  const response = await fetch("controller/register.contr.php", {
                     method: "POST",
                     headers: {
                        "Content-Type": "application/json",
                     },
                     body: JSON.stringify(formData),
                  });
                  const data = await response.json();
                  console.log(data);

                  if (data.success) {
                     window.location.href = "./?";
                  } else if (data.error) {
                     alert(data.error);
                  } else {
                     alert("Erreur lors de la connexion");
                  }

               } else {
                  alert('Les mots de passe ne correspondent pas');
               }
            } else {
               alert('Veuillez saisir un mot de passe composé d\' au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');
            }
         } else {
            alert('Veuillez saisir une adresse mail valide');
         }
      } else {
         alert('Veuillez remplir tous les champs');
      }
   });
}