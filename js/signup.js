function registra(event) {
    event.preventDefault();

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var div;
            if(xmlhttp.responseText == "OK") {
                div = document.getElementById('OK');
                div.innerHTML = '<h1>Registrazione</h1><p>Registrazione avvenuta con successo.<br>Ora puoi fare login.</p>';
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