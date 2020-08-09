<?php 
/*session_start();
if(!isset($_SESSION["cod_logado"]))//se não existe
{
	header("location:login.php");//envia para login
}

if($_SESSION["nivel_logado"] != 1)
{
	header("location:index.php");
}
*/
include_once("controller/usuario.controller.php");
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
			<h3>Cadastro de Usuários</h3><hr>
		<div class="card">
		<div class="card-header">
			Dados do usuário
			<a href="index.php" class="btn btn-warning btn-sm float-right">Voltar ao início</a>
			<label class="float-right">&nbsp;</label>
			<a href="cons_usuario.php" class="btn btn-primary btn-sm float-right">Consultar usuário</a>
		</div>
		<div class="card-body">
		<form method="POST" action="?acao=cadastrar_usu" onsubmit="return VerificarSenha();">
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" name="nome" class="form-control" required>
				</div>
				<div class="form-group">
					<label>E-mail:</label>
					<input type="email" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Senha:</label>
					<input type="password" name="senha" id="senha" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Confirmar senha:</label>
					<input type="password" name="confirmar" id="confirmar" class="form-control" required>
				</div>
				<div class="form-group">
				<label>Nível de acesso:</label>
					<select name="nivel_acesso" class="form-control">
						<option value="1">Administrador</option>
						<option value="2">Usuário</option>
					</select>
				</div>


				<input type="submit" class="btn btn-primary" value="GRAVAR">
			</form>
		</div>
		</div>
		</div>
	</div>
	</div>

<script>

	function VerificarSenha()
	{
		senha = document.getElementById('senha').value;
		confirmar = document.getElementById('confirmar').value;
		if(senha != confirmar)
		{
			alert("Verifique a confirmação da senha");
			return false;
		}
		else
		{
			return true; 
		}
	}

</script>
	
</body>
</html>