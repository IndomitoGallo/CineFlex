<?php
    /* avendo inserito il preventDefault() nel js ora bisogna controllare che i campi non siano vuoti ! */
    if(strlen($_GET['name']) > 4) {
        echo "OK"; die();
    }
    else {
        echo "ERROR";
    }
?>