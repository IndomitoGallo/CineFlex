function caricaAside() {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        var div;
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            div = document.getElementById('aside'); /* modifico #commenti */
            div.innerHTML = xmlhttp.responseText;    
        }
    };
        
    xmlhttp.open("GET", "../php/aside.php", true);
    xmlhttp.send();
    
}