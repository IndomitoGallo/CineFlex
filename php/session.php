<?php

    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_WARNING); //mostra tutto tranne avvisi e avvertimenti
    
    session_start();
    
    if(isset($_SESSION['user'])){
        echo $_SESSION['user'];
    } else {
        session_destroy();
        echo "NOT LOGGED";
    }
    
?>