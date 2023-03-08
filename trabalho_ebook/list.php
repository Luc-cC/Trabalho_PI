<?php

$db_connect = pg_connect("host=192.168.20.18 port=5432 dbname=lucascesar user=lucascesar password=123456");

include('session.php');

//Pegar dados do Ebook
$select_ebook = "SELECT nome_usuario
,nome_editora
,nome_autor
,titulo_ebook
,valor_ebook
,link_ebook
,A.id_usuario
,id_ebook

from ebook.tb_ebook A
,ebook.tb_usuario B
,ebook.tb_editora C
,ebook.tb_autor D

where B.id_usuario = A.id_usuario
and C.id_editora = A.id_editora
and D.id_autor = A.id_autor";

$result_ebook = pg_query($db_connect, $select_ebook);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Lista</title>
</head>

<body>
<table border='1'>
<tr>
<th>Usuário</th>
<th>Autor</th>
<th>Editora</th>
<th>Título</th>
<th>Valor</th>
<th>Link</th>
</tr>

<?php while($row = pg_fetch_assoc($result_ebook)) { ?> 
<tr>;
<td><?php echo $row['nome_usuario']; ?></td>
<td><?php echo $row['nome_editora']; ?></td>
<td><?php echo $row['nome_autor']; ?></td>
<td><?php echo $row['titulo_ebook']; ?></td>
<td><?php echo $row['valor_ebook']; ?></td>
<td><?php echo $row['link_ebook']; ?></td>

<?php
if($_SESSION['id_usuario'] == $row['id_usuario'] ){?>
<td><?php echo "<a href ='delete.php?id_ebook=".$row['id_ebook']."'>Excluir</a>"; ?></td> 
<td><?php echo "<a href ='edit.php?id_ebook=".$row['id_ebook']. "'>Editar</a>"; ?></td> 
<?php } ?>
<?php } ?>

</tr>
</table>  

<?php
?>


<a href="logout.php">Sair</a>

</body>

</html>