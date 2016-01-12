function registra(e) {
    
    var form = document.getElementById('login_form');
    if (form.checkValidity() == true) {   /*viene effettuato un check del form prima del run dello script*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            var div;
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == "OK") {
                    div = document.getElementById('signup');
                    div.innerHTML = 'Ciao, NOME-UTENTE!';
                }
                else if(xmlhttp.responseText == "USER_ERROR") {
                    div = document.getElementById('ERROR');
                    div.innerHTML = 'Errore: username già esistente!';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "5px 15px";
                }
                else if(xmlhttp.responseText == "MAIL_ERROR") {
                    div = document.getElementById('ERROR');
                    div.innerHTML = 'Errore: esiste già un account registrato con quella email!';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "5px 15px";
                }
                else if(xmlhttp.responseText == "DB_ERROR") {
                    div = document.getElementById('ERROR');
                    div.innerHTML = 'Errore: non è stato possibile effettuare la registrazione, riprova più tardi.';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "5px 15px";
                }
                else { /*errore generico in caso dal php venga passata una stringa non riconosciuta*/
                    div = document.getElementById('ERROR');
                    div.innerHTML = 'Errore.';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "5px 15px";
                }
            }
        };
        
        var name = document.getElementById('name').value;
        var surname = document.getElementById('surname').value;
        var mail = document.getElementById('mail').value;
        var utente = document.getElementById('utente').value;
        var pswd = document.getElementById('pswd').value;
        
        var params = "name=" + name + "&surname=" + surname + "&mail=" + mail + "&utente=" + utente + "&pswd=" + pswd;
        
        xmlhttp.open("GET", "php/login_prova.php?" + params, true);
        xmlhttp.send();
        
        /*elimina l'azione di default associata all'input type="submit" di ricaricare tutta la pagina*/
        e.preventDefault();
    }

}