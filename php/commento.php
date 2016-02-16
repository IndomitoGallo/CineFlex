<?php

    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING); //mostra tutto tranne avvisi e avvertimenti
    
    session_start();
    
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
        die("DB_ERROR"); //nel js lanceremo un messaggio: non è stato possibile inserire il commento
    }

    //Prendo l'utente dalla sessione, la nota e il film dallo script in js
    $user = $_SESSION['user'];
    $nota = mysqli_real_escape_string($conn, $_GET['nota']); //escape dei caratteri quali l'apostrofo per il DB
    $film = $_GET['film'];    
    
    $data = date("Y-m-d H:i:s");

    $sql = "INSERT INTO commento VALUES(NULL, '{$user}','{$nota}', '{$data}', '{$film}')";

    //Eseguo la query
    if(!mysqli_query($conn, $sql)){
        /*effettuo il log dell'errore su un file di testo, all'amministratore del sito interessano i
        dettagli tecnici di cosa è andato storto, invece all'utente lancio un messaggio generico*/
        error_log(date("Y-m-d H:i:s") . " - DB query failed on: " . $sql . "\nMessagge: " . mysqli_error($conn) . "\n", 3, "./error.log");
        echo "DB_ERROR"; //nel js lanceremo un messaggio: non è stato possibile inserire il commento
    } else {
        echo "OK";
    }
    
    //Chiudo la connessione
    mysqli_close($conn);
    
?>