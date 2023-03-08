<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Usuário - (Cadastro)</title>
</head>

<body>

<h1>Cadastro de Usuário</h1>

<form method="POST" action = "verifica_registro.php">

<?php 

session_start();

$errors = array();

if(isset ($_SESSION['success'])){

$errors[] = $_SESSION['success'];
}

include('errors.php'); 

?>

<label for="username">Usuário:
<br>
</label><input type="text" id = "username" name="username"> 
<br><br>

<label for="email">Email:</label>
<br>
<input type="email" id = "email" name="email" >
<br><br>

<label for="password_1">Senha:</label>
<br>
<input type="password" id = "password_1" name="password_1"> 
<br><br>

<label for="password_2">Confirme Senha:</label>
<br>
<input type="password" id = "password_2" name="password_2"> 
<br><br>

<button type="submit" id ="reg_usuario" name = "reg_usuario" class="btn">Cadastrar</button>

<p>Tem conta?
<a href="login_usuario.php">Clique aqui para dar login!</a>
</p>

</form>

</body>

</html>

