<?php
    //session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="phpProject9.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="Javascript-project.js" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="css/ViewArticlecss.css" rel="stylesheet" type="text/css"/>
        <link href="http://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>     
        <title></title>
    </head>
    <body>
        <header>
            <?php  include 'header.inc.php' ?>
        </header>
        <title>Index</title>
        <main>
            <nav class="md-col-3" id="mainnavbar">
            <?php  include 'sidenav.inc.php' ?>
            </nav>
            <div class='container md-col-6' id="indexcontainer">
                <div class="container">
                    <div id="main" class="carousel slide" data-interval="7000" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#main" data-slide-to="0" class="active"></li>
                            <li data-target="#main" data-slide-to="1"></li>
                            <li data-target="#main" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <div>
                                    <!--  echo post here-->
                                    <header>
                                    <p><font size="7" face="Georgia, Arial" color="maroon">POPULAR</font></p>
                                    </header>
                                    <?php include 'popular.inc.php' ?>
                                </div>
                            </div>
                            <div class="item">
                                <div>
                                    <!-- echo post here-->
                                    <header>
                                    <p><font size="7" face="Georgia, Arial" color="maroon">NEW</font></p>
                                    </header>
                                    <?php include 'new.inc.php' ?>
                                </div>
                            </div>
                            <div class="item">
                                <div>
                                    <!-- echo post here-->
                                    <header>
                                    <p><font size="7" face="Georgia, Arial" color="maroon">EDITOR'S RECOMMEND</font></p>
                                    </header>
                                    <?php include 'editorpick.inc.php' ?>
                                </div>
                            </div>
                        </div>
                        <a href="#main" class="left carousel-control" data-slide="prev" id='leftcarosel'>
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#main" class="right carousel-control" data-slide="next" id='rightcarosel'>
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>                
                </div>
            </div>
        <?php  ?>
        </main>
        <footer>
            <?php  include 'footer.inc.php' ?>
        </footer>
    </body>
</html>


