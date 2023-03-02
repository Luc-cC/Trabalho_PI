<?php

// Inicia uma nova sessão ou resume uma sessão existente
session_start();

// verifica se ha sessão para variável/chave
// não está configurada - ou deixou de existir
if (!isset($_SESSION['id_usuario']))
{
	session_destroy();
	header("Location: logout.php");
}

?>
