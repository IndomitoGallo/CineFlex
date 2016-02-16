function login(e, filmCorrente) {
    
    var form = document.getElementById('login_form');
    if (form.checkValidity() == true) {   /*viene effettuato un check del form prima del run dello script*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            var div;
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == "USER_ERROR") {
                    div = document.getElementById('ERROR2');
                    div.innerHTML = 'Username errato!';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "10px 5px 0px 5px";
                    div.style.textTransform = "none";
                    div.style.fontWeight = "normal";
                }
                else if(xmlhttp.responseText == "PWD_ERROR") {
                    div = document.getElementById('ERROR2');
                    div.innerHTML = 'Password errata!';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "10px 5px 0px 5px";
                    div.style.textTransform = "none";
                    div.style.fontWeight = "normal";
                }
                else if(xmlhttp.responseText == "DB_ERROR") {
                    div = document.getElementById('ERROR2');
                    div.innerHTML = 'Login non disponibile.<br>Riprova più tardi.';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "10px 5px 0px 5px";
                    div.style.textTransform = "none";
                    div.style.fontWeight = "normal";
                }
                else { // caso in cui il login è andato a buon fine e lo script php restituisce il nome dell'utente
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
                                    '<input type="submit" name="submit" value="Invia" onclick="commento(event, &quot;' + filmCorrente + '&quot;)">';
                }
            }
        };
        
        var user = document.getElementById('user').value;
        var pwd = document.getElementById('pwd').value;
        
        var params = "user=" + user + "&pwd=" + pwd;
        
        xmlhttp.open("GET", "../php/login.php?" + params, true);
        xmlhttp.send();
        
        /*elimina l'azione di default associata all'input type="submit" di ricaricare tutta la pagina*/
        e.preventDefault();
    }

}