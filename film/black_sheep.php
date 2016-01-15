<!DOCTYPE html>

<html>
<head>
    <title>CineFlex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Icona del Sito-->
	<link href='../img/icona_film.ico' rel='icon' type='image/x-icon'/>
	<!--Stili-->
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen and (min-width:992px)">
	<link rel="stylesheet" type="text/css" href="../css/smartphone.css" media="screen and (max-width:767px)">
	<link rel="stylesheet" type="text/css" href="../css/tablet.css" media="screen and (min-width:768px) and (max-width:991px)">
    
    <!--Script-->
	<script type="text/javascript" language="Javascript" src="../js/menubarFilm.js"></script>
    <script type="text/javascript" language="Javascript" src="../js/commento.js"></script>
	<script type="text/javascript" language="Javascript" src="../js/loginFilm.js"></script>
    
</head>

<body onload="">

    <header>
        <nav class="menubar">
            <a id="logo" href="../index.html">CineFlex</a>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li onmouseover="mostraMenu('submenu')" onmouseout="mostraMenu('submenu')">
                    <a class="selected" href="../films.php">Film<img id="arrow" src="../img/arrow-right.png"></a>					
                    <ul id="submenu">
                        <li><a href="../films.php?genere=anim">Animazione</a></li>
                        <li><a href="../films.php?genere=advn">Avventura</a></li>
                        <li><a href="../films.php?genere=cmdy">Commedia</a></li>
                        <li><a href="../films.php?genere=dram">Drammatico</a></li>
                        <li><a href="../films.php?genere=fnts">Fantascienza</a></li>
                        <li><a href="../films.php?genere=fnty">Fantasy</a></li>
                        <li><a href="../films.php?genere=war">Guerra</a></li>
                        <li><a href="../films.php?genere=hror">Horror</a></li>
                        <li><a href="../films.php?genere=thrl">Thriller</a></li>
                        <li><a href="../films.php?genere=wstr">Western</a></li>                        
                    </ul>
                </li>
				<li><a href="../about.html">About</a></li>
				<li><a href="../contact_us.html">Contattaci</a></li>
			</ul>
			<ul id="login_reg">
				<li><a href="../signup.html" id="signup"><img src="../img/signup.png">SignUp</a></li>
                <li id="login" onmouseover="mostraLogin('login_form')" onmouseout="mostraLogin('login_form')">
                    <a><img src="../img/login.png">Login</a>
                    <form id="login_form">
                        <label for="user">Username:</label>
                        <input id="user" name="user" type="text" required><br>
                        <label for="pwd">Password:</label>
                        <input id="pwd" name="pwd" type="password" required><br>
						<div id="ERROR2"></div>
                        <input type="submit" id="submit" name="submit" onclick="login(event)" value="Login">
                    </form>
                </li>
			</ul>
        </nav>
    </header>
    
    <div id="container">      
        <section class="col-md-9 col-sm-9 col-xs-12">
            <p><img src="../img/poster/poster-blacksheep.jpg" class="poster"></p>
            <p class="info">                
                <b>Titolo:</b> Black Sheep<br><br>
                <b>Anno:</b> 2006<br><br>
                <b>Regia:</b> Jonathan King.<br><br>
                <b>Interpreti:</b> Nathan Meister, Danielle Mason, Tammy Davis, Peter Feeney, 
                Matthew Chamberlain, Oliver Driver, Tandi Wright, Mick Rose.<br><br>
                <b>Durata:</b> 87 min
            </p>
            <p class="trama">
                <b>Trama:</b><br>
                Nuova Zelanda. Henry Oldfield ha un trauma nel suo passato. Il fratello Angus, quando erano poco più che bambini,
                un giorno uccise una pecora e ne indossò il vello sanguinante per spaventarlo. Quella paura, legata anche a un
                doloroso avvenimento, è rimasta nell'intimo dell'ormai uomo Henry che torna dopo 15 anni di assenza alla fattoria
                ormai saldamente nelle mani del fratello. Il quale ha assoldato una scienziata perché proceda a esperimenti
                genetici mai tentati prima sulle pecore.
                Quando Grant e la sua amica Experience, due animalisti convinti, riescono a entrare in possesso di uno degli
                agnelli sottoposti a sperimentazione l'orrore ha inizio. Grant viene infatti morso dall'animale e ha inizio la
                sua trasformazione in ovino carnivoro. Ben presto l'epidemia si diffonde e il numero delle pecore assetate di
                sangue si fa elevato. Toccherà proprio ad Henry, vincendo la sua fobia, a Experience e al fattore Tucker cercare
                di contrastare la loro ferocia.
                Soffia un buon vento dalla Nuova Zelanda se, dopo il famosissimo Peter Jackson, ci viene offerta l'opera prima
                di un regista che certamente si ispira al fratello cinematograficamente maggiore e ai suoi primi film ma che sa
                anche trovare una propria cifra stilistica. 
                Jonathan King (pura e semplice coincidenza di cognome con il Maestro dell'horror contemporaneo) dimostra di
                saper padroneggiare il genere mescolando con maestria il gore, il ribaltamento di ruoli
                (la pecora che diventa lupo) riuscendo anche a sfiorare il grottesco consapevolmente e senza
                mai perdere di vista la tensione narrativa. 
                Gli omaggi più o meno espliciti a tipologie di genere consolidate si fondono con un j'accuse nei
                confronti della scienza che stravolge le regole della Natura che rimane negli occhi e nella mente (d'ora
                in avanti guarderete pecore e affini con altri occhi) senza che ci sia mai il benché minimo accenno
                predicatorio o moraleggiante. La pecora Dolly ha senz'altro un diritto di primogenitura per quanto riguarda
                lo script ma King ha saputo tosarla a dovere per produrre una lana di buona qualità.
            </p>
            <p><b>Commenti:</b></p>
			<div id="commenti">
				<?php
				 
					//CONNESSIONE AL DATABASE
					$servername = "localhost";
					$username = "root";
					$password = "";
					/*$password = "aeg20e";*/
					$dbname = "dbpw";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					
					//La seguente funzione forza la trasmissione dei dati con la codifica utf8
					mysqli_set_charset($conn, "utf8");
					
					//controllo sulla connessione
					if(!$conn) {
						/*effettuo il log dell'errore su un file di testo, all'amministratore del sito interessano i
						dettagli tecnici di cosa è andato storto, invece all'utente lancio un messaggio generico*/
						error_log(date("Y-m-d H:i:s") . " - DB connection failed: " . mysqli_connect_error() . "\n", 3, "../php/error.log");
						die();
					}
					
					$sql = "SELECT username, nota, data FROM commento WHERE film='Black Sheep' ORDER BY data DESC";
				
					$result = mysqli_query($conn, $sql);
					
					if(!$result) {
						/*effettuo il log dell'errore su un file di testo, all'amministratore del sito interessano i
						dettagli tecnici di cosa è andato storto, invece all'utente lancio un messaggio generico*/
						error_log(date("Y-m-d H:i:s") . " - DB query failed on: " . $sql . "\nMessagge: " . mysqli_error($conn) . "\n", 3, "../php/error.log");
						echo "<p>Errore nel caricamento dei commenti.</p>"; 
					}
					else {
						$num = mysqli_num_rows($result);
						$count = 0;
						if($num > 0) {
							while($row = mysqli_fetch_array($result)) {
								echo "<p><strong>" . $row[0] . "</strong> - " . $row[2] . "</p>";
								echo "<p class=\"nota\">" . $row[1] . "</p>";
								$count++;
								if($count < $num)
									echo "<hr>"; //non viene inserita la barra per l'ultimo commento
							}
						}
						else {
							echo "<p>Nessun commento presente</p>";
						}
					}
					
					//Rilascio la risorsa
					mysqli_free_result($result);
					//Chiudo la connessione
					mysqli_close($conn);
				
				?>
			</div>
            <div id="nuovo_comm">
                <b>Nuovo commento (max 500 caratteri):</b>
                <div id="msg"></div>
                <form id="form_comm">
                    <textarea onclick="mostraMsg()" id="nota" name="nota" rows="4" maxlength="500" placeholder="Scrivi ..."  readonly></textarea><br>
                    <button onclick="mostraMsg()" type="button">Invia</button>
                </form>
            </div>
        </section>
		<aside class="col-md-3 col-sm-3 col-xs-12">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore incidunt suscipit similique,
                dolor corrupti cumque qui consectetur autem laborum fuga quas ipsam doloribus sequi, mollitia,
                repellendus sapiente repudiandae labore rerum amet culpa inventore, modi non. Quo nisi
                veritatis vitae nam, labore fugit. Inventore culpa iusto, officia exercitationem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore incidunt suscipit similique,
                dolor corrupti cumque qui consectetur autem laborum fuga quas ipsam doloribus sequi. 
            </p>
        </aside>  
    </div>
    
    <footer>
        <small id="copyright">Copyright © 2016 cineflex.it - All Rights Reserved.</small>
        <small id="webmaster">Webmaster: Luca Talocci & Lorenzo Bernabei</small>
    </footer>

</body>
</html>