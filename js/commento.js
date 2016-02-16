function mostraMsg() { //questa funzione è chiamata se si prova a commentare ma non si è loggati
    
    var div = document.getElementById('msg');
    div.innerHTML = "Prima di poter commentare devi fare il login!";
    div.style.color = "red";
    div.style.textDecoration = "underline";
    div.style.padding = "0px 15px 12px 15px";

}

function commento(e, filmCorrente) { //questa funzione viene chiamata quando l'utente inserisce un commento
    
    var form = document.getElementById('form_comm');
    if (form.checkValidity() == true) {   /*viene effettuato un check del form prima del run dello script*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == "DB_ERROR") {
                    var div = document.getElementById('msg');
                    div.innerHTML = "Non è stato possibile inserire il commento!";
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "0px 15px 12px 15px";
                } else { //caso di inserimento riuscito
                    window.location.assign(""); // ricarica la pagina per visualizzare il nuovo commento inserito
                }
            }
        };
        
        var nota = document.getElementById('nota').value;
        
        /*il metodo replace in questo caso rimpiazza ogni \n con <br> per visualizzare correttamente
        il commento*/
        var params = "nota=" + nota.replace(/\n/g, "<br>") + "&film=" + filmCorrente; // la funzio

        xmlhttp.open("GET", "../php/commento.php?" + params, true);
        xmlhttp.send();
        
        /*elimina l'azione di default associata all'input type="submit" di ricaricare tutta la pagina*/
        e.preventDefault();
    }

}