<?php

    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING); //mostra tutto tranne avvisi e avvertimenti
    
    session_start();
    
    if(isset($_SESSION['user'])){
        echo $_SESSION['user'];
    } else {
        //in questo caso l'utente non è loggato quindi session_start() ha creato una nuova sessione che va distrutta
        session_destroy();
        echo "NOT LOGGED";
    }
    
?>