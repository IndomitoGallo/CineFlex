function mostraMsg() {
    
    var div = document.getElementById('msg');
    console.log(div);
    div.innerHTML = "Prima di poter commentare devi fare il login!";
    div.style.color = "red";
    div.style.textDecoration = "underline";
    div.style.padding = "0px 15px 12px 15px";

}

function commento(filmCorrente) {
    
    var form = document.getElementById('form_comm');
    if (form.checkValidity() == true) {   /*viene effettuato un check del form prima del run dello script*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == "DB_ERROR") {
                    alert('Errore: non è stato possibile inserire il commento, riprova più tardi.');
                }
            }
        };
        
        var nota = document.getElementById('nota').value;
        
        var params = "nota=" + nota + "&film=" + filmCorrente;
        
        xmlhttp.open("GET", "../php/commento.php?" + params, true);
        xmlhttp.send();
    }

}