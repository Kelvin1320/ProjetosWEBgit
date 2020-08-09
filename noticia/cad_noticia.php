<?php 
session_start();
if(!isset($_SESSION["cod_logado"]))//se não existe
{
	header("location:login.php");//envia para login
}
include_once("controller/noticia.controller.php");
include_once("controller/categoria.controller.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuários</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<br>
		<div class="col-12">
			<h3>Cadastro de Notícias</h3><hr>
		<div class="card">
		<div class="card-header">
			Dados da notícia
			<a href="index.php" class="btn btn-warning btn-sm float-right">Voltar ao início</a>
			<label class="float-right">&nbsp;</label>
			<a href="cons_noticia.php" class="btn btn-primary btn-sm float-right">Consultar notícia</a>
		</div>
		<div class="card-body">
		<form method="POST" action="?acao=cadastrar_not" enctype="multipart/form-data">
				<div class="form-group">
					<label>Título:</label>
					<input type="text" name="titulo" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Autor:</label>
					<input type="text" name="autor" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Data:</label>
					<input type="date" name="data" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Imagem:</label>
					<input type="file" name="imagem" class="form-control" required accept="image/*">
				</div>
				<div class="form-group">
					<label>Conteúdo:</label>
					<textarea class="form-control" id="conteudo" name="conteudo"></textarea>
				</div>
				<div class="form-group">
				<label>Categoria:</label>
					<select name="codcategoria" class="form-control">
					<?php foreach ($cat->Consultar() as $value): ?>
						<option value="<?php echo $value->codcategoria;?>"><?php echo $value->nomecategoria;?></option>
					<?php endforeach;?>
					</select>
				</div>


				<input type="submit" class="btn btn-primary" value="GRAVAR">
			</form>
		</div>
		</div>
		</div>
	</div>
	</div>
	<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	<script>
			CKEDITOR.replace( 'conteudo' );
	</script>
</body>
</html>