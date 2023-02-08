<?php
include('registro_login_usuario.php');

//Conectar banco de dados
$db_connect = pg_connect("host=200.19.1.18 port=5432 dbname=lucascesar user=lucascesar password=123456");

//Select do Autor
$select_autor ="select * from ebook.tb_autor order by nome_autor";
$result_autor = pg_query($db_connect, $select_autor);

//Select da Editora
$select_editora ="select * from ebook.tb_editora order by nome_editora";
$result_editora = pg_query($db_connect, $select_editora);

//Submit
if(isset($_POST['cadastrar'])){

//Salvando os dados inseridos
$id_autor = pg_escape_string($db_connect,$_POST['autor']);
$id_editora = pg_escape_string($db_connect,$_POST['editora']);
$titulo = pg_escape_string($db_connect,$_POST['titulo']);
$valor = pg_escape_string($db_connect,$_POST['valor']);
$link = pg_escape_string($db_connect,$_POST['link']);

//Verificando se todos os dados foram inseridos
if (empty($id_autor)) { array_push($errors, "Autor é necessário"); }
if (empty($id_editora)) { array_push($errors, "Editora é necessário"); }
if (empty($titulo)) { array_push($errors, "Titulo é necessário"); }
if (empty($valor)) { array_push($errors, "Valor é necessário"); }
if (empty($link)) { array_push($errors, "Link é necessário"); }

//Se nenhum erro encontrado, cadastrar o usuario
if (count($errors) == 0) {
$sql = "insert into ebook.tb_ebook(id_usuario,id_autor, id_editora, titulo_ebook, valor_ebook, link_ebook) values('$_SESSION[id_usuario]','$id_autor','$id_editora','$titulo','$valor','$link')";
$ret_submit = pg_query($db_connect, $sql);
}

}
?>