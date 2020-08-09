<?php
//incluir funções model
include_once("model/categoria.php");
$cat = new Categoria();//instanciar classe usuario

//verificar operação a ser executada
if(isset($_REQUEST["acao"]))
{
	switch ($_REQUEST["acao"]) 
	{
		case 'cadastrar_cat':
			//enviar valores para variáveis	
			$cat->nomecategoria = $_POST["nomecategoria"];
			//executando o método cadastar
			$cat->Cadastrar();
			//mensagem de confirmação
			echo "<script>
					alert('Dados gravados com sucesso!');
					window.location='cad_categoria.php';
				</script>";
			break;
		case 'excluir_cat':
			$cat->codcategoria = $_GET['codcategoria'];
			if($cat->Excluir())//verdadeiro
			{
				//redirecionar para página de consulta
				header("location:cons_categoria.php");
			}
			else {
				echo "<script>
					alert('Erro!');
					window.location='cons_categoria.php';
				</script>";
			}
		break;
		case 'atualizar_cat':
			//enviar valores para variáveis	
			$cat->nomecategoria 	= $_POST["nomecategoria"];
			$cat->codcategoria		= $_POST["codcategoria"];
			
			//executando o método atualizar
			$cat->Atualizar();
			//mensagem de confirmação
			echo "<script>
					alert('Dados gravados com sucesso!');
					window.location='cons_categoria.php';
				</script>";
		break;
		case 'dados_cat':
			$cat->codcategoria = $_GET['codcategoria'];
			$cat = $cat->RetornarDados();
		break;
	}
} 



?>