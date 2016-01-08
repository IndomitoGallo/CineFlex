function mostraMsg() {
    
    var div = document.getElementById('msg');
    console.log(div);
    div.innerHTML = "Prima di poter commentare devi fare il login!";
    div.style.color = "red";
    div.style.textDecoration = "underline";
    div.style.padding = "0px 15px 12px 15px";

}