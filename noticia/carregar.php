
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exenplo Paginação</title>
</head>
<body>

<!--conteudo da pagina sera carregado dentro da div-->
	<div id="conteudo"></div>

<button id="carregar_mais" pagina="1">Carregar mais...</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
	//função carregar todos
	$(document).ready(function(){
		$.ajax({
			url: 'conteudo.php', //Arquivo com o conteudo
			data: {inicio:0}, //pagina inicial
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