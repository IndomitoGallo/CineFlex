function mostraMenu(menuCorrente) {	/*usato sia per il submenu dei film che per menu a tendina di tablet e smartphone*/
	if (document.getElementById(menuCorrente)) {
		stileMenu = document.getElementById(menuCorrente).style;
		if (stileMenu.visibility== "visible") {
			stileMenu.visibility = "hidden";
			if (menuCorrente == 'submenu') {                        
				document.getElementById('arrow').src = "img/arrow-right.png";
			}
		}
		else {
			stileMenu.visibility = "visible";
			if (menuCorrente == 'submenu') {
				document.getElementById('arrow').src = "img/arrow-down.png";
			}					
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