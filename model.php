<?php

    if(isset($_SESSION["USERID"])){
    $UserID=$_SESSION["USERID"];
    $Admin=$_SESSION["ADMIN"];
    }
        else
    {
        $UserID='';
        $Admin='No';
    }
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
        <title>Hobby Union - Model Kits</title>
    </head>
    <body>
        <header>
            <?php  include 'header.inc.php' ?>
        </header>
        
        <main>
            <nav class="md-col-3" id="mainnavbar">
            <?php  include 'sidenav.inc.php' ?>
            </nav>
            <div class='container md-col-6'><p><font size="6" face="Georgia, Arial" color="maroon">Modal Kit Reviews</font></p>
            <?php

            require_once('/protected/config.php');
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

            $error = mysqli_connect_error();
            if ($error != null) {
                $output = "<p>Unable to connect to database</p" . $error;
                exit($output);

            }
            require_once('/protected/config.php');
            $sql="SELECT * FROM article a ,user u WHERE a.UserID=u.UserID AND Interest='Modelkits' ORDER BY DatePosted DESC LIMIT 5;";
            $result = mysqli_query($connection, $sql);
                while($row= mysqli_fetch_assoc($result)){
                $ArticleID=$row['ArticleID'];
                $EditerUserID=$row['UserID'];
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
                            <?php if($UserID==$EditerUserID||$Admin=='Yes'){?>
                            <form action = "EditArticle.php" method = "post">
                                    <input type="hidden" name="ArticleID" value="<?php echo $ArticleID?>">
                                    <input type="submit" name="Edit" value="Edit" />
                                </form>
                            <?php }
                            else{
                                echo "";
                            }?> 
                            <div>
                                <div class="timestamp">
                                    <?php echo $DatePosted?>
                                    <?php echo $UserName?>
                                    Total View: <?php echo $ViewCount ?>
                                </div>                
                            </div>

                            <div>
                                <img src=" <?php echo $ImageLocation;?>
                                     " class="img-responsive center-block" width="80%" height="80%" alt="" class="thumbnail"/>                
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
            </div>
        </main>
        
        <footer>
            <?php  include 'footer.inc.php' ?>
        </footer>
    </body>
</html>