function invia(e) { //questa funzione viene chiamata quando un utente di utilizzare il "Contattaci"
    
    var form = document.getElementById('contact_form');
    if (form.checkValidity() == true) {   /*viene effettuato un check del form prima del run dello script*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == "OK") {
                    div = document.getElementById('OK');
                    div.innerHTML = '<h1>Contattaci</h1><p>Email inviata.<br>Ti faremo sapere al più presto!</p>';
                }   else {
                    div = document.getElementById('ERROR');
                    div.innerHTML = "Siamo spiacenti ma sono occorsi degli errori nell'invio dell'email.";
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "5px 15px";
                }    
            }
        };
        
        var name = document.getElementById('name').value;
        var mail = document.getElementById('mail').value;
        var msg = document.getElementById('msg').value;
        
        /*il metodo replace in questo caso rimpiazza ogni \n con <br> per essere visualizzato
        correttamente nell'email*/
        var params = "name=" + name + "&mail=" + mail + "&msg=" + msg.replace(/\n/g, "<br>");

        xmlhttp.open("GET", "php/invia.php?" + params, true);
        xmlhttp.send();
        
        /*elimina l'azione di default associata all'input type="submit" di ricaricare tutta la pagina*/
        e.preventDefault();
    }

}