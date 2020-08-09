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
	<title>Consulta de Categorias</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<br>
<h2>Consulta de Categorias</h2><hr>
<div class="card">
		<div class="card-header">
			Dados da categoria
			<a href="index.php" class="btn btn-warning btn-sm float-right">Voltar ao início</a>
			<label class="float-right">&nbsp;</label>
			<a href="cad_categoria.php" class="btn btn-primary btn-sm float-right">Adicionar categoria</a>
		</div>
		<div class="card-body">

	<table id="tabela" class="table table-striped ">
		<thead>
			<th>Nome da categoria</th>
			<th>Ação</th>
		</thead>
		<tbody>
			<?php
			foreach ($cat->Consultar() as $value) 
			{
				if($_SESSION["nivel_logado"] == 1)
				{
					echo "<tr>
							<td>$value->nomecategoria</td>
							<td>
							<a href='?codcategoria=$value->codcategoria&acao=excluir_cat' onclick='return Confirmar()' class='btn btn-danger btn-sm'>Excluir</a>

							<a href='atu_categoria.php?codcategoria=$value->codcategoria&acao=dados_cat' class='btn btn-warning btn-sm'>Editar</a>
							
							</td>
						  </tr>";
				}
				else
				{
					echo "<tr>
						<td>$value->nomecategoria</td>
						<td>
				
						<a href='atu_categoria.php?codcategoria=$value->codcategoria&acao=dados_cat' class='btn btn-warning btn-sm'>Editar</a>
						</td>
					  </tr>";
				}
			}
			?>
		</tbody>
	</table>

</div>
</div>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



<script type="text/javascript">
	$(document).ready( function () {
    $('#tabela').DataTable({
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            });
} );



</script>

<script type="text/javascript">
function Confirmar()
{
	return confirm('Deseja realmente excluir esta categoria?');
}
</script>

</html>