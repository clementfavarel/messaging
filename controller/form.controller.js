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