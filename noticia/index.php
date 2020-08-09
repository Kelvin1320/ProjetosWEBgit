<?php
session_start();
if(!isset($_SESSION["cod_logado"]))//se não existe
{
	header("location:login.php");//envia para login
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto PHP</title>
</head>
<body>
<h2>Projeto PHP com MySQL</h2>
<fieldset>
	<legend><h3>Menu - <?php echo $_SESSION["nome_logado"];?></h3></legend>
	<?php if($_SESSION["nivel_logado"] == 1){?>
	<a href="cons_usuario.php">Usuários</a><br><?php } ?>
	<a href="cons_categoria.php">Categorias</a><br>
	<a href="cons_noticia.php">Notícias</a><br>
	<a href="login.php?acao=sair">Sair</a>

</fieldset>
</body>
</html>