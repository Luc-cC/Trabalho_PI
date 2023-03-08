<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Usuário - (Login)</title>
</head>

<body>

<h2>Login de Usuário</h2>

<form method="POST" action="verifica_login.php">

<?php

session_start();

$errors = array();

if(isset ($_SESSION['success'])){

$errors[] = $_SESSION['success'];
}

include("errors.php");

?>

<label for="username">Usuário:</label>
<br>
<input type="text" id="username" name="username">
<br><br>

<label for="senha">Senha:</label>
<br>
<input type="password" id = "password" name="password">
<br><br>

<button type="submit" class="btn" name = "login_usuario">Login</button>

<p>Não tem conta?
<a href="registro_usuario.php">Clique aqui para se registrar!</a>
</p>
    
</form>

</body>

</html>