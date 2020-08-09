<?php
//incluir funções model
include_once("model/noticia.php");
$not = new Noticia();//instanciar classe usuario

//verificar operação a ser executada
if(isset($_REQUEST["acao"]))
{
	switch ($_REQUEST["acao"]) 
	{
		case 'cadastrar_not':
			//enviar valores para variáveis	
			$not->titulo 		= $_POST["titulo"];
			$not->autor 		= $_POST["autor"];
			$not->data			= $_POST["data"];
			$not->conteudo		= $_POST["conteudo"];

			//código para upload de arquivos
			$nome_arquivo = $_FILES["imagem"]["name"];
			$destino = "imagens/$nome_arquivo";
			$nome_tmp = $_FILES["imagem"]["tmp_name"];

			move_uploaded_file($nome_tmp, $destino);

			//$not->imagem		= $_POST["imagem"];
			$not->imagem		= $nome_arquivo;


			$not->codcategoria	= $_POST["codcategoria"];
			
			//executando o método cadastar
			$not->Cadastrar();
			//mensagem de confirmação
			echo "<script>
					alert('Dados gravados com sucesso!');
					window.location='cad_noticia.php';
				</script>";
		break;
		case 'excluir_not':
			$not->codnoticia = $_GET['codnoticia'];
			$not = $not->RetornarDados();//retornando os dados para pegar imagem
			$not->Excluir();//excluir noticia
			//excluir imagem
			unlink("imagens/$not->imagem");
			//redirecionar para página de consulta
			header("location:cons_noticia.php");
		break;
		case 'atualizar_not':
			//enviar valores para variáveis	
			$not->titulo 		= $_POST["titulo"];
			$not->autor 		= $_POST["autor"];
			$not->data			= $_POST["data"];
			$not->conteudo		= $_POST["conteudo"];
			$not->codcategoria	= $_POST["codcategoria"];
			$not->codnoticia	= $_POST["codnoticia"];

			if($_FILES['imagem']['error'] == 0)
			{
				unlink("imagens/".$_POST["img"]);//excluir imagem
				//código para upload de arquivos
				$nome_arquivo = $_FILES["imagem"]["name"];
				$destino = "imagens/$nome_arquivo";
				$nome_tmp = $_FILES["imagem"]["tmp_name"];

				move_uploaded_file($nome_tmp, $destino);

				//$not->imagem		= $_POST["imagem"];
				$not->imagem		= $nome_arquivo;
			}
			else 
			{
				$not->imagem		= $_POST["img"];
			}
			
			//executando o método atualizar
			$not->Atualizar();
			//mensagem de confirmação
			echo "<script>
					alert('Dados gravados com sucesso!');
					window.location='cons_noticia.php';
				</script>";
		break;
		case 'dados_not':
			$not->codnoticia = $_GET['codnoticia'];
			$not = $not->RetornarDados();
		break;
	}
} 



?>