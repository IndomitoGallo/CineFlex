function mostraMenu(menuCorrente) {
			if (document.getElementById(menuCorrente)) {
				stileMenu = document.getElementById(menuCorrente).style;
				if (stileMenu.visibility== "visible") {
					stileMenu.visibility = "hidden";
					document.getElementById('arrow').src = "img/arrow-right.png";
				}
				else {
					stileMenu.visibility = "visible";
					document.getElementById('arrow').src = "img/arrow-down.png";
				}
			}
		}