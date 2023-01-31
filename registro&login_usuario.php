<?php

//Dados do usuário da sessão
$nome_usuario = "";
$email_usuario = "";
$senha_usuario = "";
$_SESSION['success']= "";

//Conectar banco de dados
$db_connect = pg_connect("host=200.19.1.18 port=5432 dbname=lucascesar user=lucascesar password=123456");



//Registrar
if (isset($_POST['registrar_usuario'])) {

//Colocar os dados da tabela
$sql = "insert into ebook.tb_usuario(nome_usuario, email_usuario, senha_usuario) values('$nome_usuario','$email_usuario','$senha_usuario')";
$ret = pg_query($db_connect, $sql);

$_SESSION['username'] = $nome_usuario;

header('location: main.php');
}



//Login
if(isset($_POST['login'])){

$email = pg_escape_string($db_connect, $_POST['email']);
$password = pg_escape_string($db_connect, $_POST['password']);

//Pegar os dados da tabela
$sql = "select * from ebook.tb_usuario where email_usuario = '$email_usuario' and senha_usuario = '$senha_usuario'";
$ret = pg_query($db_connect, $sql);

//Se os dados forem pegos com sucesso, iniciar sessão
if (pg_num_rows($ret) == 1) {
             
$_SESSION['username'] = $nome_usuario;
         
header('location: main.php');

}
}

?>