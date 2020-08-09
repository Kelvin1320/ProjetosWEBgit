	<?php  
	include_once('controller/noticia.controller.php');
	$qtd_pagina = 2; //quantidade de paginas
	$inicio = $_GET["inicio"]; 
	$inicio = $inicio * $qtd_pagina;

	$codcategoria = "";
	if(isset($_GET["codcategoria"]))
	$codcategoria = $_GET["codcategoria"];

	//Realizando consulta
	foreach ($not->ConsultarLimit($inicio, $qtd_pagina,$codcategoria) as $value) {
	


				echo "<div class='col-sm-12'>
					<div class='card'>
					  <img width='600' height='600' src='imagens/$value->imagem'   class='img img-fluid'>
					  <div class='card-body'>
					    <h5 class='card-title'> Titulo: $value->titulo</h5>
					    <p class='card-text'> Data: $value->data<br></p>
					    <p class='card-text'> Autor: $value->autor<br></p>
					  <a href='#' class='btn btn-primary'>Ver mais</a>
					  </div>
					</div>				
				</div>";




	}



	?>
	<div id="conteudo"></div>