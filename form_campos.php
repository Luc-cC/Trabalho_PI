<?php

require_once("banco.php")


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Index</title>
</head>

<body>
    <h1>Cadastro de E-Book</h1>
<form>
    
    <label for="autor">Autor:
    <br>
    </label><input type="text">
    <br><br>
    <label for="editora">Editora:</label>
    <br>
    <input type="text">
    <br><br>
    <label for="titulo">Titulo:</label>
    <br>
    <input type="text">
    <br><br>
    <label for="valor">Preço:</label>
    <br>
    <input type="number">
    <br><br>
    <label for="link">Link:</label>
    <br>
    <input type="text">
    <br><br>
    <input type="submit">
    
</form>
</body>

</html>