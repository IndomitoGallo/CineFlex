<?php

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
        die("DB_ERROR"); //nel js lanceremo un messaggio: non è stato possibile effettuare la registrazione    
    }

    //Prendo mail e username in ingresso per verificare che non siano già presenti nel Database
    $mail = $_GET['mail'];
    $user = $_GET['utente'];
    
    $sql1 = "SELECT * FROM utente WHERE username='{$user}'";

    $result1 = mysqli_query($conn, $sql1);
        
    $sql2 = "SELECT * FROM utente WHERE email='{$mail}'";
    
    $result2 = mysqli_query($conn, $sql2);
        
    if(mysqli_num_rows($result1) > 0) {
                
        echo "USER_ERROR"; //nel js lanceremo un messaggio: username già esistente
                
    } elseif(mysqli_num_rows($result2) > 0) {
                
        echo "MAIL_ERROR"; //nel js lanceremo un messaggio: esiste già un account associato a questa mail
                
    } else {
        $name = $_GET['name'];
        $surname = $_GET['surname'];
        $pwd = $_GET['pswd'];
                
        $sql = "INSERT INTO utente VALUES('{$user}','{$name}', '{$surname}', '{$pwd}', '{$mail}')";
                
        //Eseguo la query
        if(!mysqli_query($conn, $sql)){
            /*effettuo il log dell'errore su un file di testo, all'amministratore del sito interessano i
            dettagli tecnici di cosa è andato storto, invece all'utente lancio un messaggio generico*/
            error_log(date("Y-m-d H:i:s") . " - DB query failed on: " . $sql . "\nMessagge: " . mysqli_error($conn) . "\n", 3, "./error.log");
            echo "DB_ERROR"; //nel js lanceremo un messaggio: non è stato possibile effettuare la registrazione
        } else {
            echo "OK";
        }        
    }

    //Rilascio le risorse
    mysqli_free_result($result1);
    mysqli_free_result($result2);
    //Chiudo la connessione
    mysqli_close($conn);
    
?>