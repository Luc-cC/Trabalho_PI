<?php

include('registro&login_usuario.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Usuário - (Login)</title>
</head>

<body>
    <h1>Login de Usuário</h1>
<form name = "login" method="POST">
    
    <label for="email">Email:</label>
    <br>
    <input type="email" name="email" required>
    <br><br>
    <label for="senha">Senha:</label>
    <br>
    <input type="password" name="password"  required>
    <br><br>
    <input type="submit" name = "login_usuario" value="Entrar">
    
</form>
</body>

</html>