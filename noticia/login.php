<?php 
include_once("controller/usuario.controller.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Sistema Notícias</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
	<div class="container justify-content-center">
		<div class="row">
			<div class="col-6 mx-auto">
				<br>
				<h3>Sistema Notícias</h3>
				<hr>
				<div class="card">
					<div class="card-header">
						Acessar Sistema
					</div>
					<div class="card-body">
						<?php
						session_start();
						if(!isset($_SESSION["tentativas"]))
						{
							$_SESSION["tentativas"] = 0;
						}

						if($_SESSION["tentativas"] < 3)
						{

						?>

						<form method="POST" action="?acao=logar_usu">
							<div class="form-group">
								<label>E-mail:</label>
								<input type="email" name="email" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Senha:</label>
								<input type="password" name="senha" class="form-control" required>
							</div>
							<input type="submit" class="btn btn-primary" value="GRAVAR">
							<a href="phpmailer/index.php">Contato</a><br>
						</form>


						<?php

						}
						else
						{

							$valor1 = rand(1,10);
							$valor2 = rand(1,10);
							$total = $valor1 + $valor2;
						?>

						<form method="POST" action="?acao=tentativas">
							<div class="form-group">
								<label><?php echo "Responda: Quanto é $valor1 + $valor2"; ?></label>
								<input type="number" name="resposta" class="form-control" required>
								<input type="hidden" name="total" value="<?php echo $total;?>"/>
							</div>
							<input type="submit" class="btn btn-primary" value="GRAVAR">
						</form>

						<?php
						}
						?>	




					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>