function login(e) {
    
    var form = document.getElementById('login_form');
    if (form.checkValidity() == true) {   /*viene effettuato un check del form prima del run dello script*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            var div;
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == "OK") {
                    div = document.getElementById('signup'); /* modifico #signup */
                    div.removeAttribute('href');
                    div.innerHTML = 'Ciao, NOME-UTENTE!';
                    div.style.cursor = 'pointer';
                    div = document.getElementById('login'); /* modifico #login */
                    div.innerHTML = '<a><img src="img/logout.png">Logout</a>';
                    div.removeAttribute('onmouseover');
                    div.removeAttribute('onmouseout');
                    div.setAttribute("onclick", "logout(event)");
                }
                else if(xmlhttp.responseText == "USER_ERROR") {
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
                else { /*errore generico in caso dal php venga passata una stringa non riconosciuta*/
                    div = document.getElementById('ERROR2');
                    div.innerHTML = 'Errore.';
                    div.style.color = "red";
                    div.style.textDecoration = "underline";
                    div.style.padding = "10px 5px 0px 5px";
                    div.style.textTransform = "none";
                    div.style.fontWeight = "normal";
                }
            }
        };
        
        var user = document.getElementById('user').value;
        var pwd = document.getElementById('pwd').value;
        
        var params = "user=" + user + "&pwd=" + pwd;
        
        xmlhttp.open("GET", "php/login.php?" + params, true);
        xmlhttp.send();
        
        /*elimina l'azione di default associata all'input type="submit" di ricaricare tutta la pagina*/
        e.preventDefault();
    }

}