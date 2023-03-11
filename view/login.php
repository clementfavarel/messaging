<!DOCTYPE html>
<html lang="fr">
<?php
session_start();
if (isset($_SESSION['user'])) {
   header('Location: index.php?home');
}
include 'view/include/head.php';
?>

<body>
   login
</body>

</html>