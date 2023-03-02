<?php

session_start();


//Conectar banco de dados
$db_connect = pg_connect("host=192.168.20.18 port=5432 dbname=lucascesar user=lucascesar password=123456");

$errors = array();

//Registrar
if (isset($_POST['reg_usuario'])) {

    //Salvando os dados inseridos
    $nome_usuario = pg_escape_string($db_connect,$_POST['username']);
    $email_usuario = pg_escape_string($db_connect,$_POST['email']);
    $senha_usuario_1 = pg_escape_string($db_connect,$_POST['password_1']);
    $senha_usuario_2 = pg_escape_string($db_connect,$_POST['password_2']);

    //Verificando se todos os dados foram inseridos
    if (empty($nome_usuario)) { array_push($errors, "Usuário é necessário"); }
    if (empty($email_usuario)) { array_push($errors, "Email é necessário"); }
    if (empty($senha_usuario_1)) { array_push($errors, "Senha é necessário"); }

    //Verificando se as senhas são iguais
    if ($senha_usuario_1 != $senha_usuario_2) {

        array_push($errors, "As duas senhas não são iguais");

    }

    //Se nenhum erro encontrado, cadastrar o usuario
    if (count($errors) == 0) {

        //Salvar senha
        $senha_usuario = ($senha_usuario_1);

        //Colocar os dados na tabela
        $sql = "INSERT into ebook.tb_usuario(nome_usuario, email_usuario, senha_usuario) 
        values('$nome_usuario'
        ,'$email_usuario'
        ,'$senha_usuario')";

        $ret = pg_query($db_connect, $sql);

        //Select da id do usuário
        $select_id ="SELECT id_usuario, nome_usuario from ebook.tb_usuario where nome_usuario like '$nome_usuario' and senha_usuario ='$senha_usuario' ";

        $result_id = pg_query($db_connect, $select_id);
        $row_id = pg_fetch_array($result_id);

        //Guardando o id do usuário logado em uma variável sessão  
        $_SESSION['id_usuario'] = $row_id['id_usuario'];

        //Guardando o Usuário logado na variável sessão
        $_SESSION['username'] = $nome_usuario;

        //Guardando a senha do Usuário logado na variável sessão
        $_SESSION['password'] = $senha_usuario;

        //Mensagem de boas vindas
        $_SESSION['success'] = "Você está logado";

        //Página que o usuario será mandado após se logar
        header('location: cadastro_ebook.php');

    }

    else {

        //Se o nome de usuário e a senha não coincide

        $_SESSION['success'] = "Registro incorreto"; 

        header('location: registro_usuario.php');

    }

    }



?>