<?php 
session_start();
if(!isset($_SESSION["cod_logado"]))//se não existe
{
	header("location:login.php");//envia para login
}
include_once("controller/categoria.controller.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Categorias</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<br>
		<div class="col-12">
			<h3>Cadastro de Categorias</h3><hr>
		<div class="card">
		<div class="card-header">
			Dados da categoria
			<a href="index.php" class="btn btn-warning btn-sm float-right">Voltar ao início</a>
			<label class="float-right">&nbsp;</label>
			<a href="cons_categoria.php" class="btn btn-primary btn-sm float-right">Consultar categoria</a>
		</div>
		<div class="card-body">
		<form method="POST" action="?acao=atualizar_cat">
				<div class="form-group">
					<label>Código da categoria:</label>
					<input type="text" name="codcategoria" class="form-control" required readonly value="<?php echo $cat->codcategoria;?>">
				</div>
				<div class="form-group">
					<label>Nome da Categoria:</label>
					<input type="text" name="nomecategoria" class="form-control" required value="<?php echo $cat->nomecategoria;?>">
				</div>

				<input type="submit" class="btn btn-primary" value="GRAVAR">
			</form>
		</div>
		</div>
		</div>
	</div>
	</div>
	
</body>
</html>