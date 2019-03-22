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


//azure video
var myOptions = {
    "nativeControlsForTouch": false,
    controls: true,
    autoplay: true,
    width: "100%",
    height: "auto",
}
myPlayer = amp("azuremediaplayer", myOptions);
myPlayer.src([
        {
            "src": "//trailer-aueas.streaming.media.azure.net/a641d201-9b58-45ff-ab3a-cebd05d75cf5/forwebsite.ism/manifest",
            "type": "application/vnd.ms-sstr+xml"
        }
]);

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

// Get the video
var video = document.getElementById("video");

// Get the button
var btn = document.getElementById("vbtn");

// Pause and play the video, and change the button text
function vbtn() {
    var video = document.getElementById("video");
    var btn = document.getElementById("vbtn");
    if (video.paused) {
        video.play();
        btn.innerHTML = "Pause";
    } else {
        video.pause();
        btn.innerHTML = "Play";
    }
}

// function resize() {
//     var v = document.getElementById("contentonvideo"); 

//     var w = window.innerWidth;
//     var h = window.innerHeight;
//     //console.log(w);
//     //console.log(h);
 
//         var ratio = (v.clientHeight / v.clientWidth);
//         if (v.clientHeight > h && v.clientWidth < w) {
//             v.style.height = h + "px";
//             v.style.width = (h / ratio) + "px";
//         }
//         if (v.clientHeight <= h && v.clientWidth < w && ratio > 1) {
//             v.style.height = h + "px";
//             v.style.width = (h / ratio) + "px";
//         }
//         if (v.clientWidth >= w) {
//             v.style.width = w + "px";
//         }
//         if (v.clientHeight < h && v.clientWidth <= w  && ratio < 1) {
//             v.style.width = w + "px";
//         }
// }

// resize();
// window.onresize = resize;


//for booking ticket/////////////////////////////////////////////////////////////////////////////
// $('#area_dropdown.dropdown-item').on('click', function(){
//     var str = $(this).html();
//     alert(str);
//     $('#areabtn_name').text(str);
// });

// window.onload = getareaDropitem();
var currentSid = "";
var currentSes = "";

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
            cleanTheatername();
            cleanSession();
            cleanSeats();
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
            cleanSession();
            cleanSeats();
        }
    };
    xmlhttp.open("GET", "session_onclick.php?mid="+mid+"&tid="+tid, true);
    xmlhttp.send();
}

function bookdrop3(sid, val) {
    // alert(str);
    currentSid = sid;
    currentSes = val;

    document.getElementById("sessionbtntext").innerHTML = val;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            document.getElementById("seatsdrop").innerHTML = xmlhttp.response;
            cleanSeats();
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
            document.getElementById("seatbtntext").innerHTML = xmlhttp.response;
            
        }
    };
    xmlhttp.open("GET", "checkseats_onclick.php?bs="+val, true);
    xmlhttp.send();
}

function cleanTheatername () {
    document.getElementById("theaterbtntext").innerHTML = "Theater list";
}

function cleanSession () {
    document.getElementById("sessionbtntext").innerHTML = "Session list";
}

function cleanSeats () {
    document.getElementById("seatbtntext").innerHTML = "0";
}

function bookthisticket () {
    // var area = document.getElementById("areabtntext").textContent;
    var theaterName = document.getElementById("theaterbtntext").textContent;
    // var session = document.getElementById("sessionbtntext").textContent;
    var seats = document.getElementById("seatbtntext").textContent;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            
        }
    };
    xmlhttp.open("GET", "bookthisticket.php?tn="+theaterName+"&se="+currentSes+"&seid="+currentSid+"&seat="+seats, true);
    xmlhttp.send();
}

