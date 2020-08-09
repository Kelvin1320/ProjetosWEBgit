<?php 
include_once("controller/categoria.controller.php");
include_once("controller/noticia.controller.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Início</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body background="imagens/fundo.jpg">
	<br>

<div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		 <a class="navbar-brand" href="home.php">Projeto Notícia</a>
	</nav>
	<br>
	<div class="row">
		<div class="col-4">
			<div class="list-group">
				<?php foreach ($cat->Consultar() as $value): 

				 $not->codcategoria = $value->codcategoria;
					$quantidade_noticia =  count($not->ConsultarPorCategoria()); ?>

				 <a href="home.php?codcategoria=<?php echo $value->codcategoria; ?>" class="list-group-item list-group-item-action"><?php echo $value->nomecategoria; echo "<p class='float-right'><font color=red> $quantidade_noticia </font></p>";?></a>
				 <?php  ?>
				 <?php endforeach;?>
			</div>
		</div>
		<div class="col-8">
			<div class="row">


				<div id="conteudo"></div>





			


			</div><br>
			<button id="carregar_mais" class='btn btn-primary' pagina="1">Carregar mais...</button>
		</div>

	</div>
	
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<script>
	//função carregar todos
	$(document).ready(function(){
		$.ajax({
			url: 'conteudo.php', //Arquivo com o conteudo
			data: {inicio:0}, //pagina inicial
			<?php if(isset($_GET["codcategoria"])) echo 'data: {codcategoria:'.$_GET['codcategoria'].'},';?>
			type: 'GET', //metodo de envio da pagina

			//caso conseguiu retornar
			success: function(response){
				//função que adiciona no div o conteudo inicial
				$('#conteudo').html(response);
			}
	  });
}); 		


//função carregar mais
$(document).ready(function(){
	$('#carregar_mais').click(function(){
		//armazenando a proxima pagina do botão
		var proxima_pagina = $(this).attr('pagina');
		$.ajax({
			url: 'conteudo.php', //pagina conteudo
			data: {inicio: proxima_pagina}, //com base no click
			type: "GET", //metodo de envio

			//conseguiu retornar
			success:function(response){
				$('#conteudo').append(response); //inclui conteudo novo
			},
			//apos completar a operação adiciona mais 1
			complete: function(){
				$('#carregar_mais').attr('pagina', parseInt(proxima_pagina) + 1);

			}
		});
	});
});

	
</script>
</body>
</html>