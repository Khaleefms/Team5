var IDLE_TIMEOUT = 60;
var _idleSecondsCounter = 0;

window.addEventListener('load',init);

function init() {
    window.addEventListener('click', function(){
        _idleSecondsCounter = 0;
    });
    window.addEventListener('mousemove', function(){
        _idleSecondsCounter = 0;
    });
    window.addEventListener('keypress', function(){
        _idleSecondsCounter = 0;
    });
    window.setInterval(checkIdleTime, 1000); //milliseconds
}
//function checkIdleTime() {
//    _idleSecondsCounter++;
//    if (_idleSecondsCounter >= IDLE_TIMEOUT) {
//        alert("Time Expired!!!");
//        window.clearInterval ();
//        window.location.href = "index.html"; // return to home page
//    }
//}

//sound when hover
var clicking = $("#clicksound")[0];
$("p").mouseenter(function() {
    clicking.play();
});

var clicking = $("#clicksound0")[0];
$("a").mouseenter(function() {
    clicking.play();
});





// 
// $("#mainnav a")
//  .each(function(i) {
//    if (i != 0) { 
//      $("#beep-two")
//        .clone()
//        .attr("id", "beep-two" + i)
//        .appendTo($(this).parent()); 
//    }
//    $(this).data("beeper", i);
//  })
//  .mouseenter(function() {
//    $("#beep-two" + $(this).data("beeper"))[0].play();
//  });
//$("#beep-two").attr("id", "beep-two0");



//function init(){
//var signup = document.getElementById("sign");
//signup.addEventListener("click", boxShow);
//}
//
//function boxShow1(){
//    document.getElementById("sign_inform").style.display = "block";
//}
//function boxShow2(){
//    document.getElementById("sign_upform").style.display = "block";
//}
//function boxShow3(){
//    document.getElementById("edit_form").style.display = "block";
//}
//function boxRemove1(){
//    document.getElementById("sign_inform").style.display = "none";
//}
//function boxRemove2(){
//    document.getElementById("sign_upform").style.display = "none";
//}
//function boxRemove3(){
//    document.getElementById("edit_form").style.display = "none";
//}
//
