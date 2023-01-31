<?php

include ('registro&login_usuario.php')

if (!isset($_SESSION['username'])) {
   echo "Precisa Logar";
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Main</title>
</head>

<body>
<a href="login_usuario.php">
Login

<?php if (isset($_SESSION['success'])) : ?>
<div class="error success" >
<h3>
<?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
</h3>
</div>
<?php endif ?>
</a>

<?php  if (isset($_SESSION['username'])) : ?>
<p>
 Welcome
<?php echo $_SESSION['username']; ?>
</p>
<p>
<a href="login_usuario.php?logout='1'" style="color: red;">
Logout
</a>
</p>
<?php endif ?>
</div>

    
</body>

</html>