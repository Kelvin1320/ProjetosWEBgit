<?php  
include_once("controller/noticia.controller.php")
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Exenplo Paginação</title>
</head>
<body>
	<?php  
	$qtd_pagina = 2; //quantidade de paginas
	$total_paginas = ceil(count($not->Consultar()) / $qtd_pagina);
	$inicio = 0; //ponto inicial

	if (isset($_GET["pag"])){
		$inicio = $_GET["pag"] - 1; 
			$inicio = $inicio * $qtd_pagina;
	}

	//Realizando consulta
	foreach ($not->ConsultarLimit($inicio, $qtd_pagina) as $value) {
		echo "Titulo: $value->titulo - Data: $value->data<br>";
	}

echo "<br>";

//exibindo paginas
for ($i= 1; $i <= $total_paginas ; $i++)
 { 

	if ($i < $total_paginas) 
		echo "<a href='paginacao.php?pag=$i'>$i, </a>";
	else
		echo "<a href='paginacao.php?pag=$i'>$i </a>";
	
}

	?>


</body>
</html>