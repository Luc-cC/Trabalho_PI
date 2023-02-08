<?php

include('select_submit_ebook.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Ebook - (Cadastro) </title>
</head>

<body>

<h1>Cadastro de E-Book</h1>

<form name = "cadastro" method = "POST">

<?php include('errors.php'); ?>

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



</body>

</html>