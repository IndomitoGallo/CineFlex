function session() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        var div;
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if(xmlhttp.responseText != "NOT LOGGED") {
                div = document.getElementById('signup'); /* modifico #signup */
                div.removeAttribute('href');
                div.innerHTML = 'Ciao, ' + xmlhttp.responseText;
                div.style.cursor = 'pointer';
                    
                div = document.getElementById('login'); /* modifico #login */
                div.innerHTML = '<a href=""><img src="img/logout.png">Logout</a>';
                div.removeAttribute('onmouseover');
                div.removeAttribute('onmouseout');
                div.setAttribute("onclick", "logout()");
            } 
        }
    }
    
    xmlhttp.open("GET", "php/session.php", true);
    xmlhttp.send();
}