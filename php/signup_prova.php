<?php
    /*error_log(date("Y-m-d H:i:s") . " ERRORE\nciao", 3, "./error.log");*/
    if(strlen($_GET['name']) > 4) {
        echo "OK"; die();
    }
    else {
        echo "ERROR";
    }
?>