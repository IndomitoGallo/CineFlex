function session(filmCorrente) { //questa funzione verifica se l'utente è loggato o meno

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        var div;
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if(xmlhttp.responseText != "NOT LOGGED") { //utente LOGGATO!
                div = document.getElementById('signup'); /* modifico #signup */
                div.removeAttribute('href');
                div.innerHTML = 'Ciao, ' + xmlhttp.responseText;
                div.style.cursor = 'pointer';
                        
                div = document.getElementById('login'); /* modifico #login */
                div.innerHTML = '<a href=""><img src="../img/logout.png">Logout</a>';
                div.removeAttribute('onmouseover');
                div.removeAttribute('onmouseout');
                div.setAttribute("onclick", "logout()");
                        
                div = document.getElementById('form_comm'); /* aggiungo la possibilità di commentare */
                div.innerHTML = '<textarea id="nota" name="nota" rows="4" maxlength="500" placeholder="Scrivi ..."  required></textarea><br>' +
                                '<input type="submit" name="submit" value="Invia" onclick="commento(&quot;' + filmCorrente + '&quot;)">';
            }
        }
    }
    
    xmlhttp.open("GET", "../php/session.php", true);
    xmlhttp.send();
}