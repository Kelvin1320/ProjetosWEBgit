<?php
require_once("phpmailer/class.phpmailer.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

$assuntoEmail = $assunto;
$TextoEmail = '<h2>Dados do contato</h2>
				<br>Nome: '.$nome 
				.'<br>E-mail: '.$email
				.'<br>Assunto: '. $assunto 
				.'<br>Mensagem: '.$mensagem;
				
$QuemRecebe = 'potergame777@gmail.com';//quem irá receber
$QuemEnvia = 'kelvin.souza22@etec.sp.gov.br';//o seu email para envio
$SenhaQuemEnvia = 'ACCD!177';//senha de quem está enviando
$NomeQuemEnvia = 'kelvin';
$porta = 465;//porta 465, 587, 25 depende do serviço
$Segurança = 'ssl'; //ssl ou tls
$smtpQuemEnvia = 'smtp-mail.outlook.com'; //procurar qual é o serviço. Ex outlook: smtp-mail.outlook.com
$TextoHTML = true;//se não for HTML deixar false



$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->Charset = 'utf-8';
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = $Segurança;	// ou SSL o qual é requerido pelo gmail
	$mail->Host = $smtpQuemEnvia;// SMTP utilizado
	$mail->Port = $porta;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = $QuemEnvia;
	$mail->Password = $SenhaQuemEnvia;//colocar a senha do email criado
	$mail->SetFrom($QuemEnvia, $NomeQuemEnvia);
	$mail->Subject = $assuntoEmail;
	$mail->Body = utf8_decode($TextoEmail);
	$mail->AddAddress($QuemRecebe);
	$mail->IsHTML($TextoHTML);//se for html true caso contrário false
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 	
	} else {
		$error = 'Mensagem enviada!';		
	}
	
	echo 'Mensagem: '.$error;
?>