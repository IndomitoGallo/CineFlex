<!DOCTYPE html>

<html>
<head>
    <title>CineFlex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Icona del Sito-->
	<link href='img/icona_film.ico' rel='icon' type='image/x-icon'/>
	<!--Stili-->
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen and (min-width:992px)">
	<link rel="stylesheet" type="text/css" href="css/smartphone.css" media="screen and (max-width:767px)">
	<link rel="stylesheet" type="text/css" href="css/tablet.css" media="screen and (min-width:768px) and (max-width:991px)">
	
    <!--Script-->
	<script type="text/javascript" language="Javascript" src="js/menubar.js"></script>
    <script type="text/javascript" language="Javascript" src="js/listafilm.js"></script>
		
</head>

<body>
	
    <header>
        <nav class="menubar">
            <a id="logo" href="index.html">CineFlex</a>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li onmouseover="mostraMenu('submenu')" onmouseout="mostraMenu('submenu')">
                    <a class="selected" href="films.php">Film<img id="arrow" src="img/arrow-right.png"></a>					
                    <ul id="submenu">
                        <li><a href="films.php?genere=anim">Animazione</a></li>
                        <li><a href="films.php?genere=advn">Avventura</a></li>
                        <li><a href="films.php?genere=cmdy">Commedia</a></li>
                        <li><a href="films.php?genere=dram">Drammatico</a></li>
                        <li><a href="films.php?genere=fnts">Fantascienza</a></li>
                        <li><a href="films.php?genere=fnty">Fantasy</a></li>
                        <li><a href="films.php?genere=war">Guerra</a></li>
                        <li><a href="films.php?genere=hror">Horror</a></li>
                        <li><a href="films.php?genere=thrl">Thriller</a></li>
                        <li><a href="films.php?genere=wstr">Western</a></li>                        
                    </ul>
                </li>
				<li><a href="about.html">About</a></li>
				<li><a href="contact_us.html">Contattaci</a></li>
			</ul>
			<ul id="login_reg">
				<li><a href="signup.html"><img src="img/signup.png">SignUp</a></li>
                <li id="login" onmouseover="mostraLogin('login_form')" onmouseout="mostraLogin('login_form')">
                    <a href="#"><img src="img/login.png">Login</a>
                    <form id="login_form">
                        <label for="user">Username:</label>
                        <input id="user" name="user" type="text" required><br>
                        <label for="pwd">Password:</label>
                        <input id="pwd" name="pwd" type="password" required><br>
                        <input type="submit" id="submit" name="submit" value="Login">
                    </form>
                </li>
			</ul>
        </nav>
    </header>
    
    <div id="container">
        <aside class="col-md-3 col-sm-3 col-xs-12">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore incidunt suscipit similique,
                dolor corrupti cumque qui consectetur autem laborum fuga quas ipsam doloribus sequi, mollitia,
                repellendus sapiente repudiandae labore rerum amet culpa inventore, modi non. Quo nisi
                veritatis vitae nam, labore fugit. Inventore culpa iusto, officia exercitationem.
            </p>
        </aside>        
        <section class="col-md-9 col-sm-9 col-xs-12">
			<ul id="film">
				<li onclick="mostraFilm('anim')">
					<a>Animazione<img id="arrowanim" src="img/arrow-right.png"></a>
					<ul id="anim" class="genere">
					</ul>
				</li>
                <li onclick="mostraFilm('advn')">
					<a>Avventura<img id="arrowadvn" src="img/arrow-right.png"></a>
					<ul id="advn" class="genere">
					</ul>
				</li>
				<li onclick="mostraFilm('cmdy')">
					<a>Commedia<img id="arrowcmdy" src="img/arrow-right.png"></a>
					<ul id="cmdy" class="genere">
					</ul>
				</li>
				<li onclick="mostraFilm('dram')">
					<a>Drammatico<img id="arrowdram" src="img/arrow-right.png"></a>
					<ul id="dram" class="genere">
					</ul>
				</li>
				<li onclick="mostraFilm('fnts')">
					<a>Fantascienza<img id="arrowfnts" src="img/arrow-right.png"></a>
					<ul id="fnts" class="genere">
						<li><a href="film/alien.html">Alien</a></li>
						<li><a href="film/interstellar.html">Interstellar</a></li>
					</ul>
				</li>
                <li onclick="mostraFilm('fnty')">
					<a>Fantasy<img id="arrowfnty" src="img/arrow-right.png"></a>
					<ul id="fnty" class="genere">
					</ul>
				</li>
				<li onclick="mostraFilm('war')">
					<a>Guerra<img id="arrowwar" src="img/arrow-right.png"></a>
					<ul id="war" class="genere">
					</ul>
				</li>
                <li onclick="mostraFilm('hror')">
					<a>Horror<img id="arrowhror" src="img/arrow-right.png"></a>
					<ul id="hror" class="genere">
						<li><a href="film/black_sheep.html">Black Sheep</a></li>
						<li><a href="film/wrong_turn.html">Wrong Turn</a></li>
					</ul>				
				</li>
                <li onclick="mostraFilm('thrl')">
					<a>Thriller<img id="arrowthrl" src="img/arrow-right.png"></a>
					<ul id="thrl" class="genere">
					</ul>
				</li>
				<li onclick="mostraFilm('wstr')">
					<a>Western<img id="arrowwstr" src="img/arrow-right.png"></a>
					<ul id="wstr" class="genere">
					</ul>
				</li>
			</ul>       
        </section>
    </div>
    
    <footer>
        <small id="copyright">Copyright © 2016 cineflex.it - All Rights Reserved.</small>
        <small id="webmaster">Webmaster: Luca Talocci & Lorenzo Bernabei</small>
    </footer>
	
	<?php
	if(isset($_GET['genere'])) {?>
		<script type="text/javascript">
			mostraFilm("<?php echo $_GET['genere']; ?>");
		</script>
	<?php }	
	?>

</body>
</html>
