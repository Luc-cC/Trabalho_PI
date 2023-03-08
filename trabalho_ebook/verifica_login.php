<?php

session_start();

//Conectar banco de dados
$db_connect = pg_connect("host=192.168.20.18 port=5432 dbname=lucascesar user=lucascesar password=123456");

$errors = array();

//Salvando os dados inseridos
$nome_usuario = pg_escape_string($db_connect, $_POST['username']);
$senha_usuario = pg_escape_string($db_connect, $_POST['password']);

//Verificando se todos os dados foram inseridos
if (empty($nome_usuario)) { array_push($errors, "Usuário é necessário"); }
if (empty($senha_usuario)) { array_push($errors, "Senha é necessário"); }

//Verificar se ouve algum erro
if (count($errors) == 0) {

    //Verificando se a senha coincide
    $senha_usuario = ($senha_usuario);

    $sql = "SELECT * from ebook.tb_usuario where nome_usuario = '$nome_usuario' and senha_usuario = '$senha_usuario'";
    $result = pg_query($db_connect, $sql);

    //Se $result = 1, significa que um usuário com o nome de usuário inserido existe
    if (pg_num_rows($result) == 1) {

        //Select da id do usuário
        $select_id ="SELECT id_usuario, nome_usuario from ebook.tb_usuario where nome_usuario like '$nome_usuario' and senha_usuario ='$senha_usuario' ";
        $result_id = pg_query($db_connect, $select_id);

        //Guardando o id do usuário logado em uma variável sessão  
        $row_id = pg_fetch_array($result_id);
        $_SESSION['id_usuario'] = $row_id['id_usuario'];


        //Mensagem de boas vindas
        $_SESSION['success'] = "Você está logado";     

        //Página que o usuario será mandado após se logar
        header('location: cadastro_ebook.php');

    }

    else {

        //Se o nome de usuário e a senha não coincide

        $_SESSION['success'] = "Usuário ou senha incorreto"; 

        header('location: login_usuario.php');

    }
    }

?>