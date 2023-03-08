<?php

$db_connect = pg_connect("host=192.168.20.18 port=5432 dbname=lucascesar user=lucascesar password=123456");

if(isset($_POST['submit'])){
    $sql = "insert into ebook.tb_editora(nome_editora) values('$_POST[edit]')";
    $ret = pg_query($db_connect, $sql);
   
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editora - (Cadastro)</title>
</head>

<body>
    <h1>Cadastro de Editora</h1>
<form name = "cadastro" method="POST">
    
    <label for="user">Editora:
    <br>
    </label><input type="text" id="edit" name="edit" required>
    <br><br>
    <input type="submit" id="submit" name = "submit" value="submit">
    
</form>

<a href="logout.php">Sair</a>

</body>

</html>