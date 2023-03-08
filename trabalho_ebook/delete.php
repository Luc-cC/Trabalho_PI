<?php
$db_connect = pg_connect("host=192.168.20.18 port=5432 dbname=lucascesar user=lucascesar password=123456");

if(isset($_GET['id_ebook'])){
    
    $sql = "DELETE FROM ebook.tb_ebook WHERE id_ebook = ".$_GET['id_ebook'];
    $result_sql = pg_query($db_connect, $sql);
    header("Location: list.php");

  
}
?>