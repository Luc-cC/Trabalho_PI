<?php

include('registro&login_usuario.php');

//Select do Usuario
$select_usuario ="select id_usuario from ebook.tb_usuario where email_usuario = '$email' and senha_usuario = '$password'";
$result_usuario = pg_query($db_connect, $select_usuario);

//Select do Autor
$select_autor ="select * from ebook.tb_autor order by nome_autor";
$result_autor = pg_query($db_connect, $select_autor);

//Select da Editora
$select_edit ="select * from ebook.tb_editora order by nome_editora";
$result_edit = pg_query($db_connect, $select_edit);

//Submit
if(isset($_POST['cadastrar'])){

$sql = "insert into ebook.tb_ebook(id_usuario,id_autor, id_editora, titulo_ebook, valor_ebook, link_ebook) values('$result_usuario','$_POST[autor]','$_POST[edit]','$_POST[titulo]','$_POST[valor]','$_POST[link]')";
$ret = pg_query($db_connect, $sql);
    
}
?>