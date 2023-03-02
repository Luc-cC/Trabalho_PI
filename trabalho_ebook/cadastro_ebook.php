<?php

include("session.php");

$db_connect = pg_connect("host=192.168.20.18 port=5432 dbname=lucascesar user=lucascesar password=123456");

//Select do Autor
$select_autor ="select * from ebook.tb_autor order by nome_autor";
$result_autor = pg_query($db_connect, $select_autor);

//Select da Editora
$select_editora ="select * from ebook.tb_editora order by nome_editora";
$result_editora = pg_query($db_connect, $select_editora);

$errors = array();

if(isset ($_SESSION['success'])){

$errors[] = $_SESSION['success'];
}

include("errors.php");


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Ebook - (Cadastro) </title>
</head>

<body>

<h1>Cadastro de E-Book</h1>

<form method = "POST" action = "submit_ebook.php">

    <label for="autor">Autor:
    <br>
    <select id="autor" name="autor">

        <option value = "0">-Select Autor-</option>
        <?php
        while ($row_autor = pg_fetch_assoc($result_autor) ){

        $id_autor = $row_autor['id_autor'];
        $nome_autor = $row_autor['nome_autor'];

        echo "<option value='$id_autor'>$nome_autor</option>";
        }
        ?>

    </select>
    </label>
    <br><br>

    <label for="edit">Editora:</label>
    <br>
    <select id="editora" name="editora">
        <option value = "0">-Select Editora-</option>
        <?php
        while ($row_editora = pg_fetch_assoc($result_editora) ){

        $id_editora = $row_editora['id_editora'];
        $nome_editora = $row_editora['nome_editora'];

        echo "<option value='$id_editora'>$nome_editora</option>";
        }
        ?>

    </select>
    </label>
    <br><br>

    <label for="titulo">Titulo:</label>
    <br>
    <input type="text" id="titulo" name="titulo">
    </label>
    <br><br>

    <label for="valor">Valor:</label>
    <br>
    <input type="number" id="valor" name="valor">
    </label>
    <br><br>

    <label for="link">Link:</label>
    <br>
    <input type="url" id="link" name="link">
    </label>
    <br><br>

    <input type = "submit" id = "cadastrar" name = "cadastrar" value= "Cadastrar">
    
</form>

<a href="logout.php">Sair</a>

</body>

</html>