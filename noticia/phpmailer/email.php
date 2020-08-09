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
$QuemEnvia = 'manu04.kel@gmail.com';//o seu email para envio
$SenhaQuemEnvia = 'senha';//senha de quem está enviando
$NomeQuemEnvia = 'Kelvin Lima';
$porta = 465;//porta 465, 587, 25 depende do serviço
$Seguranca = 'ssl'; //ssl ou tls
$smtpQuemEnvia = 'smtp.gmail.com'; //procurar qual é o serviço. Ex outlook: smtp-mail.outlook.com
$TextoHTML = true;//se não for HTML deixar false


$mail= new PHPMailer;
$mail->IsSMTP();        // Ativar SMTP
$mail->SMTPDebug = false;       // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
$mail->SMTPAuth = true;     // Autenticação ativada
$mail->SMTPSecure = $Seguranca;  // SSL REQUERIDO pelo GMail
$mail->Host = $smtpQuemEnvia; // SMTP utilizado
$mail->Port = $porta; 
$mail->Username = $QuemEnvia;
$mail->Password = $SenhaQuemEnvia;
$mail->SetFrom($QuemEnvia, $NomeQuemEnvia);
$mail->addAddress($QuemRecebe,'qualquer coisa que quiser');
$mail->Subject=("Assunto");
$mail->msgHTML($TextoEmail);
if ($mail->send()){
    $ok = true;
}else{
    $ok = false;
}

			echo "<script>
				alert('E-mail enviado com sucesso!');
				window.location='index.php';
			</script>";
?>