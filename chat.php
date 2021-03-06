<?php
session_start();

//
//function loginForm(){
//	echo'
//	<div id="loginform">
//	<form action="index.php" method="post">
//		<p>Please enter your name to continue:</p>
//		<label for="name">Name:</label>
//		<input type="text" name="name" id="name" />
//		<input type="submit" name="enter" id="enter" value="Enter" />
//	</form>
//	</div>
//	';
//}
//
//if(isset($_POST['enter'])){
//	if($_POST['name'] != ""){
//		$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
//		
//		//Clear file
//		$fp = fopen("log.html", 'w');
//		fclose($fp);
//		
//		$fp = fopen("log.html", 'a');
//		fwrite($fp, "<div class='msgln' id=" . time() ."><i>User ". $_SESSION['name'] ." has entered the chat session.</i><br></div>");
//		fclose($fp);
//	}
//	else{
//		echo '<span class="error">Please type in a name</span>';
//	}
//}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Chat - Customer Module</title>
        <link type="text/css" rel="stylesheet" href="style.css" />
        <link href="phpProject9.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="Javascript-project.js" type="text/javascript"></script>
    </head>
    <body>
        <?php include 'header.inc.php' ?>
        <?php include 'sidenav.inc.php' ?>
        <?php
        $_SESSION['name'] = $_SESSION['USERNAME'];
        if (!isset($_SESSION['name'])) {
            //loginForm();
        } else {

            if (isset($_GET['logout'])) {


                //Clear file
                $fp = fopen("log.html", 'w');
                fclose($fp);

                //Simple exit message
                $fp = fopen("log.html", 'a');
                fwrite($fp, "<div class='msgln'><i>User " . $_SESSION['name'] . " has left the chat session.</i><br></div>");
                fclose($fp);

                session_destroy();
                echo '<script>location.reload(true);</script>'; //Show login form again
            }
            ?>
        <div class="container"> 
            <div class="col-md-9">
                <div>
                        <div id="wrapper">
                            <div id="menu">
                                <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
<!--                                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>-->
                                <div style="clear:both"></div>
                            </div>	
                            <div id="chatbox"><?php
                                if (file_exists("log.html") && filesize("log.html") > 0) {
                                    $handle = fopen("log.html", "r");
                                    $contents = fread($handle, filesize("log.html"));
                                    fclose($handle);

                                    echo $contents;
                                }
                                ?></div>

                            <form name="message" method="post">
                                <input name="usermsg" type="text" id="usermsg" size="63" />
                                <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script type="text/javascript">
                // jQuery Document
                $(document).ready(function () {
                    //If user submits the form (Enter key or submit)
                    $("#usermsg").keydown(function (e) {
                        //Optional "user is typing" message (for small group chats)
                        //$.post("post.php", {text: "user is typing"});

                        if (e.keyCode == 13) {
                            var clientmsg = $("#usermsg").val();
                            $.post("post.php", {text: clientmsg});
                            $("#usermsg").val("");
                            return false;
                        }
                    });
                    $("#submitmsg").click(function () {
                        var clientmsg = $("#usermsg").val();
                        $.post("post.php", {text: clientmsg});
                        $("#usermsg").val("");
                        return false;
                    });

                    $("#usermsg").focus();

                    //Load the file containing the chat log
                    function loadLog() {
                        var oldscrollHeight = $("#chatbox").prop("scrollHeight") - 20;

                        $.ajax({
                            url: "log.html",
                            cache: false,
                            success: function (html) {
                                var scrolltop = $("#chatbox").scrollTop();//Get current vertical position of scroll bar


                                //Id's used to load only new messages (timewise) into the #chatbox
                                var prevmsgid = $("#chatbox div").last().attr('id');
                                var newmsgid = $(html).attr('id');
                                if (prevmsgid != newmsgid) {
                                    $("#chatbox").append(html);
                                }

                                //Autoscroll to new bottom of #chatbox if previously at bottom of #chatbox
                                var newscrollHeight = $("#chatbox").prop("scrollHeight") - 20;
                                if (scrolltop == (oldscrollHeight - 270) && newscrollHeight > oldscrollHeight) {
                                    $("#chatbox").animate({scrollTop: newscrollHeight}, 'normal');
                                }
                            },
                        });
                    }


                    setInterval(loadLog, 70);	//Reload file every 70ms

                    //If user wants to end session
                    $("#exit").click(function () {
                        var exit = confirm("Are you sure you want to end the session?");
                        if (exit == true) {
                            window.location = 'index.php?logout=true';
                        }
                    });
                });
            </script>
            <?php
        }
        ?>
    </body>
</html>