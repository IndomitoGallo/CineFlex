function logout() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "../php/logout.php", true);
    xmlhttp.send();
}