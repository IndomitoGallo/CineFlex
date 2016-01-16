function caricaCommenti(nomeFilm) {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        var div;
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            div = document.getElementById('commenti'); /* modifico #commenti */
            div.innerHTML = xmlhttp.responseText;    
        }
    };
        
    xmlhttp.open("GET", "../php/caricaCommenti.php?film=" + nomeFilm, true);
    xmlhttp.send();
    
}