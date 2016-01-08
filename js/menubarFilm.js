function mostraMenu(menuCorrente) {
			if (document.getElementById(menuCorrente)) {
				stileMenu = document.getElementById(menuCorrente).style;
				if (stileMenu.visibility== "visible") {
					stileMenu.visibility = "hidden";
					document.getElementById('arrow').src = "../img/arrow-right.png";
				}
				else {
					stileMenu.visibility = "visible";
					document.getElementById('arrow').src = "../img/arrow-down.png";
				}
			}
		}
		
function mostraLogin(loginCorrente) {
			if (document.getElementById(loginCorrente)) {
				stileLogin = document.getElementById(loginCorrente).style;
				if (stileLogin.visibility== "visible") {
					stileLogin.visibility = "hidden";
				}
				else {
					stileLogin.visibility = "visible";
				}
			}
		}