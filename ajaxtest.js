function addtoList(mid, uid) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            document.getElementById("testfield").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "test.php?mid="+mid+"&uid="+uid, true);
    xmlhttp.send();
}