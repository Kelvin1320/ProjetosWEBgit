<?php
//criar um sessão
session_start();//iniciar sessão
$_SESSION["nome_variavel"] = "Anderson Spera";
//session_destroy();//encerra todas as variáveis de sessão
//unset($_SESSION["nome_variavel"]);//excluir apenas uma
echo "criou";

?>