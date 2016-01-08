<?php
    require('phpmailer/PHPMailerAutoload.php');
    
    $name = $_GET['name'];
    $mitt = $_GET['mail'];
    $message = $_GET['msg'];
    
    $mail = new PHPMailer(); // PHPMailer è una libreria PHP per l'invio delle email
    
    $mail->IsSMTP(); // dice alla classe di usare SMTP
    
    //$mail->SMTPDebug  = 1; // abilita le informazioni di debug SMTP (per il testing)

    $mail->SMTPAuth = true; // abilita l'autenticazione SMTP
    $mail->SMTPSecure = "tls"; // imposta il modo di criptare le informazioni inviate (alternativa ssl)
    $mail->Host = "smtp.gmail.com"; // imposta GMAIL come SMTP server
    $mail->Port = 587; // imposta la porta SMTP per il server GMAIL
    $mail->Username = "cineflex15@gmail.com"; // GMAIL username
    $mail->Password = "cineflexpw2015"; // GMAIL password
    
    // from
    /* purtroppo GMAIL ha lo svantaggio di sostituire l'indirizzo immesso nel metodo setFrom con
    l'indirizzo specificato come GMAIL username, ma per il nostro scopo è una mancanza trascurabile
    dal momento che il ReplyTo non viene modificato.
    E' possibile quindi rispondere alle mail degli utenti */
    $mail->SetFrom($mitt, "Cineflex");
    $mail->AddReplyTo($mitt, $name);
    // to
    $address = "cineflex15@gmail.com";
    $mail->AddAddress($address, "Cineflex");
    // oggetto
    $mail->Subject = "Cineflex contact form";
    // corpo del messaggio
    $mail->MsgHTML($message); // effettua l'escape delle stringhe in HTML
    
    // invio
    if(!$mail->Send()) {
        error_log(date("Y-m-d H:i:s") . " - Mailer error: " . $mail->ErrorInfo . "\n", 3, "./error.log");
        echo "ERROR";
    } else {
        echo "OK";
    }
?>