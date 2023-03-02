<?php

$db_connect = pg_connect("host=192.168.20.18 port=5432 dbname=lucascesar user=lucascesar password=123456");

if(isset($_POST['submit'])){
    $sql = "insert into ebook.tb_autor(nome_autor) values('$_POST[autor]')";
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
    <h1>Cadastro de Autor</h1>
<form name = "cadastro" method="POST">
    
    <label for="user">Autor:
    <br>
    </label><input type="text" id="autor" name="autor" required>
    <br><br>
    <input type="submit" id="submit" name = "submit" value="submit">
    
</form>

<a href="logout.php">Sair</a>
</body>

</html>