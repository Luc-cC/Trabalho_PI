<?php

include('registro&login_usuario.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Usuário - (Cadastro)</title>
</head>

<body>
    <h1>Cadastro de Usuário</h1>
<form name = "cadastro" method="POST">
    
    <label for="username">Usuário:
    <br>
    </label><input type="text" name="username" value="<?php echo $nome_usuario; ?>" required> 
    <br><br>
    <label for="email">Email:</label>
    <br>
    <input type="email" name="email" value="<?php echo $email_usuario; ?>" required> 
    <br><br>
    <label for="password">Senha:</label>
    <br>
    <input type="password" name="password" value="<?php echo $senha_usuario; ?>" required> 
    <br><br>
    <input type="submit" name = "registrar_usuario" value="Cadastrar">
</form>
            


</body>

</html>

