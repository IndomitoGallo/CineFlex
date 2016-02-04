<?php

    require('phpmailer/PHPMailerAutoload.php');
    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING); //mostra tutto tranne avvisi e avvertimenti
    
    //CONNESSIONE AL DATABASE
    $servername = "localhost";
    $username = "root";
    $password = "";
    /*$password = "aeg20e";*/
    $dbname = "dbpw";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    //controllo sulla connessione
    if(!$conn) {
        /*effettuo il log dell'errore su un file di testo, all'amministratore del sito interessano i
        dettagli tecnici di cosa è andato storto, invece all'utente lancio un messaggio generico*/
        error_log(date("Y-m-d H:i:s") . " - DB connection failed: " . mysqli_connect_error() . "\n", 3, "./error.log");
        die("DB_ERROR"); //nel js lanceremo un messaggio: recupero non disponibile   
    }

    //Prendo mail in ingresso per verificare che sia già presente nel Database
    $address = $_GET['mail'];
        
    $sql = "SELECT username, password FROM utente WHERE email='{$address}'";
    
    $result = mysqli_query($conn, $sql);
        
    if(mysqli_num_rows($result) == 0) {
                
        echo "MAIL_ERROR"; //nel js lanceremo un messaggio: mail inesistente
                
    } else { // viene inviata un email con la password
        
        $row = mysqli_fetch_array($result);
        $user = $row[0];
        $pwd = $row[1];
        $mitt = 'cineflex15@gmail.com';
        $message = "Ciao, $user<br>La tua password è la seguente: $pwd<br>Saluti, Team Cineflex";
        
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
        $mail->SetFrom($mitt, "Cineflex");
        // to
        $mail->AddAddress($address, $user);
        // oggetto
        $mail->Subject = "Cineflex recupero password";
        // corpo del messaggio
        $mail->MsgHTML($message); // effettua l'escape delle stringhe in HTML
        
        // invio
        if(!$mail->Send()) {
            error_log(date("Y-m-d H:i:s") . " - Mailer error: " . $mail->ErrorInfo . "\n", 3, "./error.log");
            echo "SEND_ERROR";
        } else {
            echo "OK";
        }
        
    }

    //Rilascio la risorsa
    mysqli_free_result($result);
    //Chiudo la connessione
    mysqli_close($conn);
    
?>