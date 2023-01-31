<?php

include('select&submit_ebook.php');

if (isset($_SESSION['username'])) {
    echo "<form method = 'POST'>";
    echo "You are logged!";
    echo "<input type = 'submit' id = 'out' name = 'out' value= 'Exit'>";
    echo "</form>";

    if(isset($_POST['out'])){
    setcookie('username', "", time()-3600);
    session_destroy();
    header("login_usuario");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Index</title>
</head>

<body>
    <h1>Cadastro de E-Book</h1>
<form name = "cadastro" method = "POST">
    
    <label for="autor">Autor:
    <br>
    <select id="autor" name="autor" required>

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
    <select id="edit" name="edit" required>
        <option value = "0">-Select Edit-</option>
        <?php
        while ($row_edit = pg_fetch_assoc($result_edit) ){

        $id_edit = $row_edit['id_editora'];
        $nome_edit = $row_edit['nome_editora'];

        echo "<option value='$id_edit'>$nome_edit</option>";
        }
        ?>

    </select>
    </label>
    <br><br>

    <label for="titulo">Titulo:</label>
    <br>
    <input type="text" id="titulo" name="titulo" required>
    </label>
    <br><br>
    <label for="valor">Preço:</label>
    <br>
    <input type="number" id="valor" name="valor" required>
    </label>
    <br><br>
    <label for="link">Link:</label>
    <br>
    <input type="url" id="link" name="link" required>
    </label>
    <br><br>
    <input type = "submit" id = "cadastrar" name = "cadastrar" value= "Cadastrar">
    
</form>



</body>

</html>