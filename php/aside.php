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
		dettagli tecnici di cosa è andato storto.*/
		error_log(date("Y-m-d H:i:s") . " - DB connection failed: " . mysqli_connect_error() . "\n", 3, "./error.log");
		die("<p>Errore di connessione nel caricamento.</p>");
	}
    
	//vengono mostrati solo gli ultimi 5 commenti inseriti
	$sql = "SELECT username, nota, data, film FROM commento ORDER BY data DESC LIMIT 5";
				
	$result = mysqli_query($conn, $sql);
					
    $commenti = "";
	$num = mysqli_num_rows($result);
	$count = 0;
	if($num > 0) {
        while($row = mysqli_fetch_array($result)) {
            $commenti .= "<p><strong>" . $row[0] . "</strong><br>about " . $row[3] . "<br>" . $row[2] . "</p>";
            $commenti .= "<p class=\"notaAside\">" . $row[1] . "</p>";
            $count++;
            if($count < $num)
                $commenti .= "<hr>"; //non viene inserita la barra per l'ultimo commento
        }
        echo $commenti;
    }
    else {
        echo "<p>Nessun commento presente.</p>";
    }
					
	//Rilascio la risorsa
	mysqli_free_result($result);
    //Chiudo la connessione
	mysqli_close($conn);
				
?>