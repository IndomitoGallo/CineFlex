function registra(event) {
    
    /*elimina l'azione di default associata all'input type="submit" di ricaricare tutta la pagina*/
    event.preventDefault();

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var div;
            if(xmlhttp.responseText == "OK") {
                div = document.getElementById('OK');
                div.innerHTML = '<h1>Registrazione</h1><p>Registrazione avvenuta con successo.<br>Ora puoi fare login.</p>';
            }
            else if(xmlhttp.responseText == "USER_ERROR") {
                div = document.getElementById('ERROR');
                div.innerHTML = 'Username già esistente!';
                div.style.color = "red";
                div.style.textDecoration = "underline";
                div.style.padding = "5px 15px";
            }
            else if(xmlhttp.responseText == "MAIL_ERROR") {
                div = document.getElementById('ERROR');
                div.innerHTML = 'Esiste già un account registrato con quella email!';
                div.style.color = "red";
                div.style.textDecoration = "underline";
                div.style.padding = "5px 15px";
            }
            else if(xmlhttp.responseText == "DB_ERROR") {
                div = document.getElementById('OK');
                div.innerHTML = '<h1>Registrazione</h1><p style="text-decoration: underline; color: red;">Non è stato possibile effettuare la registrazione.<br>Riprova più tardi.</p>';
            }
            else {
                div = document.getElementById('ERROR');
                div.innerHTML = 'Errore: non hai riempito tutti i campi o i parametri non sono validi. Riprova!';
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

    xmlhttp.open("GET", "php/signup.php?" + params, true);
    xmlhttp.send();
}