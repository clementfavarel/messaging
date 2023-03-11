<!DOCTYPE html>
<html lang="fr">

<?php
session_start();
if (!isset($_SESSION['user'])) {
   header('Location: index.php?login');
}
include 'view/include/head.php';
?>

<body>
   home
</body>

</html>