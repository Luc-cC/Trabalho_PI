<?php

require_once('banco.php');

if(isset($_POST['submit'])){
    $sql = "insert into ebook.tb_usuario(nome_usuario, email_usuario, senha_usuario) values('$_POST[user]','$_POST[email]','$_POST[senha]')";
    $ret = pg_query($db_connect, $sql);
   
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Index</title>
</head>

<body>
    <h1>Cadastro de Usuario</h1>
<form name = "cadastro" method="POST">
    
    <label for="user">Usuario:
    <br>
    </label><input type="text" id="user" name="user" required>
    <br><br>
    <label for="email">Email:</label>
    <br>
    <input type="email" id="email" name="email" required>
    <br><br>
    <label for="senha">Senha:</label>
    <br>
    <input type="password" id="senha" name="senha" required>
    <br><br>
    <input type="submit" id="submit" name = "submit" value="submit">
    
</form>
</body>

</html>

