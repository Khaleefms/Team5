<?php
    session_start()
?>
<html>
    <head>
        <meta charset="UTF-8">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>                  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="css/ViewArticlecss.css" rel="stylesheet" type="text/css"/>
        <link href="http://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
        <link href="phpProject9.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="Javascript-project.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <header>
            <?php  include 'header.inc.php' ?>
        </header>
        
        <main>
            <nav class="md-col-3" id="mainnavbar">
            <?php  include 'sidenav.inc.php' ?>
            </nav>
            <?php

    require_once('/protected/config.php');
    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database</p" . $error;
        exit($output);

    }
    require_once('/protected/config.php');
    $sql="SELECT * FROM article a ,user u WHERE a.UserID=u.UserID AND Interest='Games' ORDER BY DatePosted DESC LIMIT 5;";
    $result = mysqli_query($connection, $sql);
                while($row= mysqli_fetch_assoc($result)){
                $ArticleID=$row['ArticleID'];
                $ArticleTitle=$row['ArticleTitle'];
                $ArticleContent=$row['ArticleContent'];
                $Interest=$row['Interest'];
                $Flag=$row['Flag'];
                $DatePosted=$row['DatePosted'];
                $Interes=$row['Interest'];
                $ImageLocation=$row['ImgLocation'];
                $ViewCount=$row['ViewCount'];
                $UserName=$row['UserName'];
                ?>
                 <div class="container1">
                    <div id="titleArticle">
                        <h1 id="button">
                            Title:<?php echo $ArticleTitle ?>  
                        </h1>
                    </div>
                    <div id="button">
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#<?php echo $ArticleID?>">View whole article</button>
                    </div>
                    <br>
                    <div id="<?php echo $ArticleID?>" class="collapse out">

                        <div class="container">
                            <div><p><button type="button" class="btn btn-primary">
                                <?php echo $Interest;?>  
                            </button></p></div>

                            <div>
                                <div class="timestamp">
                                    <?php echo $DatePosted?>
                                    <?php echo $UserName?>
                                    Total View: <?php echo $ViewCount ?>
                                </div>                
                            </div>

                            <div>
                                <img src=" <?php echo $ImageLocation;?>
                                     " class="img-responsive center-block" alt="" class="thumbnail"/>                
                            </div>

                            <div>
                                <p>
                                    <?php  echo $ArticleContent;?>     
                                </p>    
                            </div>    
                        </div>
                    </div>
                </div>
                <br>
                
<?php                
                }
                
                ?>
                </main>
        
        <footer>
            <?php  include 'footer.inc.php' ?>
        </footer>
    </body>
</html>