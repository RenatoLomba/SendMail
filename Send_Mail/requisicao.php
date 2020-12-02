<?php

//PHPMailer
require './libs/PHPMailer/Exception.php';
require './libs/PHPMailer/OAuth.php';
require './libs/PHPMailer/PHPMailer.php';
require './libs/PHPMailer/POP3.php';
require './libs/PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\SMTP;

//Classe Mensagem
require 'Mensagem.php';

//Verificação de segurança do script
if(empty($_POST)) {
    header('Location: index.php?erro=Acesso Negado');
}

$mensagem = new Mensagem();
$mensagem->destino = $_POST['destino'];
$mensagem->assunto = $_POST['assunto'];
$mensagem->mensagem = $_POST['mensagem'];

try {
    $mensagem->MensagemValida();
} catch(\Exception $erro) {
    header("Location: index.php?erro={$erro->getMessage()}");
    die();
}

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'rntlomba@gmail.com';                   // SMTP username
    $mail->Password   = 'Redeye@18';                            // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('rntlomba@gmail.com', 'Renato Lomba');
    $mail->addAddress($mensagem->destino);
    $mail->addReplyTo('rntlomba@gmail.com', 'Renato Lomba');
    //$mail->addAddress('ellen@example.com', 'Ellen');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

    // Content
    $mail->isHTML(true);
    $mail->Subject = "<strong>{$mensagem->assunto}</strong>";
    $mail->Body    = $mensagem->mensagem;
    //$mail->AltBody = $mensagem->mensagem;

    $mail->send();
    $mensagem->status['codigo'] = 'Sucesso';
    $mensagem->status['descricao'] = 'Mensagem enviada com sucesso!!!';
    header("Location: index.php?codigo={$mensagem->status['codigo']}&descricao={$mensagem->status['descricao']}");
} catch (Exception $e) {
    $mensagem->status['codigo'] = 'Fracasso';
    $mensagem->status['descricao']= 'Ocorreu um erro durante o envio da mensagem...';
    header("Location: index.php?codigo={$mensagem->status['codigo']}&descricao={$mensagem->status['descricao']}");
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>