function mostraMsg() { //questa funzione è chiamata se si prova a commentare ma non si è loggati
    
    var div = document.getElementById('msg');
    div.innerHTML = "Prima di poter commentare devi fare il login!";
    div.style.color = "red";
    div.style.textDecoration = "underline";
    div.style.padding = "0px 15px 12px 15px";

}

function commento(filmCorrente) { //questa funzione viene chiamata quando l'utente inserisce un commento
    
    var form = document.getElementById('form_comm');
    if (form.checkValidity() == true) {   /*viene effettuato un check del form prima del run dello script*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == "DB_ERROR") {
                    /*viene utilizzato un semplice alert e non un messaggio dinamico nell'HTML, perchè in questo caso,
                      diversamente dagli altri, viene ricaricata la pagina dopo l'inserimento del commento.
                      Questo per far visualizzare immediatamente all'utente il commento inserito.*/
                    alert('Errore: non è stato possibile inserire il commento, riprova più tardi.');
                }
            }
        };
        
        var nota = document.getElementById('nota').value;
        
        var params = "nota=" + nota + "&film=" + filmCorrente;
        
        xmlhttp.open("GET", "../php/commento.php?" + params, true);
        xmlhttp.send();
    }

}