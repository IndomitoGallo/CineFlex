function recupero(e) {
    
    var form = document.getElementById('recupero_form');
    if (form.checkValidity() == true) {
        /*viene effettuato un check del form prima del run dello script perchè la funzione chiamata
        da onclick parte in ogni caso.*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            var div;
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == "MAIL_ERROR") {
                    div = document.getElementById('MSG');
                    div.innerHTML = 'Mail non associata ad alcun profilo!';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "0px 0px 10px 15px";
                    div.style.textTransform = "none";
                    div.style.fontWeight = "normal";
                }
                else if(xmlhttp.responseText == "DB_ERROR") {
                    div = document.getElementById('MSG');
                    div.innerHTML = 'Recupero non disponibile, riprova più tardi.';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "0px 0px 10px 15px";
                    div.style.textTransform = "none";
                    div.style.fontWeight = "normal";
                }
                else if (xmlhttp.responseText == "SEND_ERROR") {
                    div = document.getElementById('MSG');
                    div.innerHTML = "Siamo spiacenti ma sono occorsi degli errori nell'invio dell'email.";
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "0px 0px 10px 15px";
                    div.style.textTransform = "none";
                    div.style.fontWeight = "normal";
                }
                else { // caso in cui il recupero è andato a buon fine e lo script php invia un email all'utente
                    div = document.getElementById('OK');
                    div.innerHTML = "E' stata inviata un email con la password all'indirizzo specificato.";
                    div.style.padding = "0px 0px 10px 15px";
                }
            }
        };
        
        var mail = document.getElementById('mail').value;
        
        xmlhttp.open("GET", "php/recupero.php?mail=" + mail, true);
        xmlhttp.send();
        
        /*elimina l'azione di default associata all'input type="submit" di ricaricare tutta la pagina*/
        e.preventDefault();
    }

}