<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPDebug = 3; // enables SMTP debug information (for testing)
$mail->SMTPAuth = true;
$mail->Username = '@gmail.com'; // Gmail address which you want to use as SMTP server
$mail->Password = ''; // Gmail address Password
$mail->SMTPSecure = "tls";
$mail->Port = '587';

$mail->setFrom('@gmail.com'); // Gmail address which you used as SMTP server
$mail->addAddress('@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

$mail->isHTML(true);
$mail->Subject = 'Message Received (Contact Page)';
$mail->Body = 'bonjour voici le message envoyé';

$mail->send();

if ($mail->send() == false){
  die($mail->ErrorInfo);
}
else {
  echo 'email envoyé';
}

?>
      