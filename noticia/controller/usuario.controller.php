<?php
//incluindo arquivo com funções do BD
include_once("model/usuario.php");
//criando o objeto da clase Usuário
$usu = new Usuario();
//verificar se existe o campo ação
if(isset($_REQUEST["acao"]))
{
	switch ($_REQUEST["acao"]) 
	{
		case 'cadastrar_usu':
			//enviando valores vindos do formulário
			$usu->nome = $_POST["nome"];
			$usu->email = $_POST["email"];
			$usu->senha = $_POST["senha"];
			$usu->nivel_acesso = $_POST["nivel_acesso"];
			//executando o método cadastrar
			$usu->Cadastrar();
			//mensagem de confirmação
			echo "<script>
				alert('Dados gravados com sucesso!');
				window.location='cad_usuario.php';
			</script>";
		break;
		case 'excluir_usu':
			$usu->codusuario = $_GET['codusuario'];
			$usu->Excluir();
			header("location:cons_usuario.php");
		break;
		case 'atualizar_usu':
			//enviando valores vindos do formulário
			$usu->nome 			= $_POST["nome"];
			$usu->email 		= $_POST["email"];
			$usu->senha 		= $_POST["senha"];
			$usu->nivel_acesso 	= $_POST["nivel_acesso"];
			$usu->codusuario 	= $_POST["codusuario"];
			//executando o método atualizar
			$usu->Atualizar();
			//mensagem de confirmação
			echo "<script>
				alert('Dados atualizados com sucesso!');
				window.location='cons_usuario.php';
			</script>";
		break;
		case 'dados_usu':
			$usu->codusuario = $_GET["codusuario"];
			//preencher objeto com método de retorno
			$usu = $usu->RetornarDados();
		break;
		case 'logar_usu':
			$usu->email = $_POST["email"];
			$usu->senha = $_POST["senha"];
			$usu = $usu->Logar();//executar método
			if($usu->codusuario == "")
			{

				session_start();
				$_SESSION["tentativas"]++;

				echo "<script>
				alert('Usuário não localizado!');
				window.location='login.php';
				</script>";
			}
			else 
			{
				session_start();
				$_SESSION["cod_logado"] = $usu->codusuario;
				$_SESSION["nome_logado"] = $usu->nome;
				$_SESSION["nivel_logado"] = $usu->nivel_acesso;
				header("location:index.php");
			}
		break;
		case 'sair':
			session_start();//inicia
			session_destroy();//finaliza
			header("location:login.php");//direciona
		break;
		case 'tentativas':
			$resposta = $_POST["resposta"];
			$total = $_POST["total"];
			if($resposta == $total)
			{
				session_start();
				$_SESSION["tentativas"] = 0;
				header("location:login.php");
			}	
			else
			{
				echo "<script>
				alert('Valor inválido!');
				window.location='login.php';
				</script>";
			}
		break;















		case 'gravar_json':
			$usu->nome = $_POST["nome"];
			$usu->email = $_POST["email"];
			$usu->senha = $_POST["senha"];
			$usu->nivel_acesso = $_POST["nivel_acesso"];
			//executando o método cadastrar
			$usu->Cadastrar();
			echo "ok";
		break;
		case 'consulta_json':
			echo json_encode($usu->Consultar());
		break;
	}
}

?>