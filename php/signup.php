<?php
    
    //CONNESSIONE AL DATABASE
    $servername = "localhost";
    $username = "root";
    $password = "aeg20e";
    $dbname = "dbpw";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //controllo sulla connessione
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());    
    }
    
    //Prendo mail e username in ingresso per verificare che non siano già presenti nel Database
    $mail = $_GET['mail'];
    $user = $_GET['utente'];
    
    $sql1 = "SELECT * FROM utenti WHERE username='{$user}'";

    $result1 = mysqli_query($conn, $sql);
    
    $sql2 = "SELECT * FROM utenti WHERE email='{$mail}'";

    $result2 = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result1) > 0) {
        
        echo "USER_ERROR"; //nel js lanceremo un messaggio: username già esistente
        
    } elseif(mysqli_num_rows($result2) > 0) {
        
        echo "MAIL_ERROR"; //nel js lanceremo un messaggio: esiste già un account associato a questa mail
        
    } else {
        $name = $_GET['name'];
        $surname = $_GET['surname'];
        $pwd = $_GET['pswd'];
        
        $sql = "INSERT INTO suggerimento VALUES('{$user}','{$name}', '{$surname}', '{$pwd}', '{$mail}')";
        
        //Eseguo la query
        if(!mysqli_query($conn, $sql)){
            echo "DB_ERROR"; //nel js lanceremo un messaggio: non è stato possibile effettuare la registrazione
        }
            
        //Chiudo la connessione
        mysqli_close($conn);
        
        echo "OK";
    }
    
    
?>