// check add-to-list status when page loaded
window.onload = checkonload();

function checkonload(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (xmlhttp.responseText == "r") {
                rfl_class();
                // location.assign("checkifinlist.php");
            }else{
                atl_class();
                // location.assign("checkifinlist.php");
            }
        }
    };
    xmlhttp.open("GET", "checkifinlist.php", true);
    xmlhttp.send();
}
//add to list
function addtolist() {
    var xh = new XMLHttpRequest();
    xh.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // alert(xh.respon  seText);
            if (xh.responseText == 1) {
                // alert("compare true");
                checkonload();
            }else{
                alert("compare failed");
            }
        }
    };
    xh.open("GET", "addtoList.php", true);
    xh.send();
}

//remove from list
function removefromlist() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            if(xmlhttp.responseText == 'success'){
                // alert("compare true");
                checkonload();
            }else{
                alert("compare failed");
            }
        }
    };
    xmlhttp.open("GET", "removefromlist.php", true);
    xmlhttp.send();
}

//change looking to addtolist
function atl_class () {
    document.getElementById("atl_btn").setAttribute ('onclick','addtolist()');
    document.getElementById("atl_btn").onclick = addtolist; 
    document.getElementById("atl_btn").innerHTML = "Add To List";
    document.getElementById("atl_btn").className = "btn btn-success";
}
//change looking to removefromlist
function rfl_class () {
    document.getElementById("atl_btn").setAttribute ('onclick','removefromlist()');
    document.getElementById("atl_btn").onclick = removefromlist; 
    document.getElementById("atl_btn").innerHTML = "Remove From List";
    document.getElementById("atl_btn").className = "btn btn-warning";
}

//set footer to bottom
$(function () {
    function fixedfooter () {
        $("footer").removeClass("fix_bottom");
            var th = document.body.scrollHeight,
                wh = window.innerHeight;
        if (!(th > wh)) {
            $("footer").addClass("fix_bottom");
        }else{
            $("footer").removeClass("fix_bottom");
        }
    };
    fixedfooter();
    $(window).resize(fixedfooter);
});

window.onload = getareaDropitem();

function getareDropitem() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            document.getElementById("areadrop").innerHTML = xmlhttp.response;
        }
    };
    xmlhttp.open("GET", "bookingform_onload.php", true);
    xmlhttp.send();
}
function bookdrop1(areaid, val) {
    // alert(val);
    document.getElementById("areabtntext").innerHTML = val;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            document.getElementById("theater_dropdown").innerHTML = xmlhttp.response;
        }
    };
    xmlhttp.open("GET", "theatername_onclick.php?areaid="+areaid, true);
    xmlhttp.send();
}
function bookdrop2(mid, tid, val) {
    // alert(str);
    document.getElementById("theaterbtntext").innerHTML = val;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            document.getElementById("sessiondrop").innerHTML = xmlhttp.response;
        }
    };
    xmlhttp.open("GET", "session_onclick.php?mid="+mid+"&tid="+tid, true);
    xmlhttp.send();
}
function bookdrop3(sid, val) {
    // alert(str);
    document.getElementById("sessionbtntext").innerHTML = val;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            document.getElementById("seatsdrop").innerHTML = xmlhttp.response;
        }
    };
    xmlhttp.open("GET", "seats_onclick.php?sid="+sid, true);
    xmlhttp.send();
}
function checkseats(val) {
    // alert(str);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            // document.getElementById("seatsdrop").innerHTML = xmlhttp.response;
            
        }
    };
    xmlhttp.open("GET", "checkseats_onclick.php?bs="+val, true);
    xmlhttp.send();
}

