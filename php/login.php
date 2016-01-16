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

    //Prendo username e password in ingresso per verificare l'autenticazione
    $user = $_GET['user'];
    $pwd = $_GET['pwd'];
    
    $sql = "SELECT password FROM utente WHERE username='{$user}'";

    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 0) {
        echo "USER_ERROR"; //nel js lanceremo un messaggio: username errato
    } else {
        $row = mysqli_fetch_array($result);
        if($row[0] != $pwd) {
            echo "PWD_ERROR"; //nel js lanceremo un messaggio: password errata
        }
        else {
            echo $user;
            session_start();
             $_SESSION['user'] = $user;
        }
    }
    
    //Rilascio la risorsa
	mysqli_free_result($result);
    //Chiudo la connessione
    mysqli_close($conn);
    
?>