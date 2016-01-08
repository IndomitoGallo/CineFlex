function mostraFilm(genereCorrente) {
			if (document.getElementById(genereCorrente)) {
				stileGenere = document.getElementById(genereCorrente).style;
				if (stileGenere.display == "block") {
					stileGenere.display = "none";
					document.getElementById('arrow'+genereCorrente).src = "img/arrow-right.png";
				}
				else {
					stileGenere.display = "block";
					document.getElementById('arrow'+genereCorrente).src = "img/arrow-down.png";
				}
			}
		}
