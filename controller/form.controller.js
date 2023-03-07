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