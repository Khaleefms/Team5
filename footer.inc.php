<audio id="clicksound0" autoplay="autoplay" preload="auto">
    <source src="audio/hoverclick.mp3" type="audio/mpeg">
    Your browser does not support the <code>audio</code> tag.
</audio>
<script>
    var clicking = $("#clicksound0")[0];
    
    $("a").mouseenter(function() {
        clicking.play();
    });
</script>
<script>src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
<script src="bootstrap-3.2.0-dist/js/bootstrap.min.js" type="text/javascript"></script>