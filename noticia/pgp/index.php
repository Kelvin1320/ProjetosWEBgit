<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<fieldset>
	<legend><h2>Formulário de Contato</h2></legend>
	<form method="post" action="email.php">
		Nome:<br>
		<input type="text" name="nome"><br>
		E-mail:<br>
		<input type="email" name="email"><br>
		Asssunto:<br>
		<input type="text" name="assunto"><br>
		Mensagem:<br>
		<textarea name="mensagem"></textarea><br>
		<br>
		<input type="submit" value="Enviar E-mail">
	</form>
</fieldset>

</body>
</html>