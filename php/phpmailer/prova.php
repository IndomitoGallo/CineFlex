<?php

require('PHPMailerAutoload.php');

$mail             = new PHPMailer();

/*$body             = file_get_contents('examples/contents.html');
$body             = str_replace("[\]",'',$body);*/

$mail->IsSMTP(); // telling the class to use SMTP

$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier - tls
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server - 587
$mail->Username   = "cineflex15@gmail.com";  // GMAIL username
$mail->Password   = "cineflexpw2015";            // GMAIL password

$mail->SetFrom('ciccioloreti@gmail.com', 'Ciccio Loreti');
$mail->AddReplyTo('ciccioloreti@gmail.com', 'Ciccio Loreti');

$mail->Subject    = "PHPMailer Test Subject via smtp (Gmail), basic";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML("ciao a tutti!\r\nLorenzo");
/*$mail->Body = "ciao a tutti!\nLorenzo";*/

$address = "cineflex15@gmail.com";
$mail->AddAddress($address, "Cineflex");

/*$mail->AddAttachment("examples/images/phpmailer.gif");      // attachment
$mail->AddAttachment("examples/images/phpmailer_mini.gif"); // attachment*/

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>